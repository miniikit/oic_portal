<?php

namespace App\Service;

use Carbon\Carbon;
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
}