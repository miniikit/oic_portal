<?php

namespace App\Service;

use Carbon\Carbon;
use function GuzzleHttp\default_ca_bundle;
use Illuminate\Support\Facades\DB;
use Goutte\Client;


class EventService
{
    /**
     * イベント一覧を取得
     * @return \Illuminate\Support\Collection
     */
    public function getAllEvents()
    {
        return DB::table('users')
            ->join('events_table','event_maker_id','=','users.id')
            ->select('events_table.id','name','event_title','event_start_date_time','event_capacity')
            ->get();
    }

    /**
     * イベント詳細
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getEvent($id)
    {
        return DB::table('events_participants_table')
            ->join('users','events_participants_table.event_user_id','=','users.id')
            ->join('events_table','events_table.id','=','events_participants_table.event_id')
            ->first();
    }

    /**
     * イベント参加者数を返却
     * @param $id
     */
    public function getEventParticipant($id)
    {
        return DB::table('events_participants_table')
            ->where('event_id',$id)
            ->where('deleted_at',null)
            ->count();
    }

    /**
     * アップデート
     */
    public function updateEvent($id,$request)
    {
        $update = array();
        $userRequest = $request->all();


        $update['event_title'] = $userRequest['event_name'];
        $update['event_text'] = $userRequest['event_text'];
        $update['event_capacity'] = $userRequest['event_capacity'];


        // 日付をDB用に変換
        $cm = new CommonService();
        $update['event_start_date_time'] = $cm->ChangeDateToDBFormat($userRequest['event_start_date_time']);
        $update['event_end_date_time'] = $cm->ChangeDateToDBFormat($userRequest['event_end_date_time']);

        if ($request->hasFile('event_image')) {
            $carbon = Carbon::now();
            $file = $request->file('event_image');

            $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
            $filePath = 'images/event_images';
            $file->move(public_path($filePath), $filename);

            $update['event_image'] = $filePath . $filename;
        }


        return DB::table('events_table')
            ->where('id',$id)
            ->where('deleted_at',null)
            ->update($update);
    }

    public function check($data,$format)
    {
        /*
         * $format = 1(string),2(int),3(datatime)
         */
        if(isset($data)){

            switch ($format){

                case 1: // String

                    if(is_string($data)){
                        return true;
                        break;
                    } else  {
                        return false;
                        break;
                    }

                case 2:

                    if(is_int($data)){
                        return true;
                        break;
                    } else {
                        return false;
                        break;
                    }

                default :
                    return false;
            }
        }else{
            return false;
        }
    }

}