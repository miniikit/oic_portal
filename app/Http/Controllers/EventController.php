<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Event;
use App\EventAuthority;
use App\EventParticipant;

class EventController extends Controller
{
    public function index()
    {
        $events = DB::table('events_table')
            //->join('events_participants_table','event_id','=','events_table.id')
            //->join('users','users.id','=','events_participants_table.event_user_id')
            ->get();

        // TODO : 本文は必要？
        // 本文
        foreach ($events as $event) {

            // 参加者数
            $event->num = DB::table('events_participants_table')->where('event_id',$event->id)->where('deleted_at',null)->count();
            // 本文
            $text = $event->event_text;
            if (strlen($text) >= 90) {
                $event->event_text = substr($text, 0, 90);
            }
        }

        return view('event.list', compact('events'));
    }

    public function detail($id)
    {
        $event_model = app(Event::class);
        $event = $event_model->where('id',$id)->first();
        $event_participant_model = app(EventParticipant::class);

        if(!Auth::guest()) {
            $userId = Auth::user()->id;

            $active_participant = $event_participant_model
                ->where('event_user_id',$userId)
                ->where('event_id',$id)
                ->first();
        }

        $participant_ct = $event_participant_model->where('event_id', $id)->get()->count();

        return view('event.detail',compact('event','active_participant','participant_ct'));
    }

    public function Participants(Request $request,$id)
    {
        $event_participant_model = app(EventParticipant::class);
        $userId = Auth::user()->id;

        $event_participant_model->create([
            'event_id' => $id,
            'event_user_id' => $userId,
            'event_authority_id' => 2
        ]);

        //flushでメッセージ表示
        Flash::success('参加しました。');
        return redirect()->route('user_event_detail', ['id' => $id]);
    }

    public function UnParticipants(Request $request,$id)
    {
        $event_participant_model = app(EventParticipant::class);
        $userId = Auth::user()->id;

        $active_participant = $event_participant_model
            ->where('event_user_id',$userId)
            ->where('event_id',$id)
            ->first();

        $active_participant->delete();

        //flushでメッセージ表示
        Flash::success('参加を取り消しました');
        return redirect()->route('user_event_detail', ['id' => $id]);
    }

    public function show()
    {
        return view('event.detail');
    }
    public function make()
    {
        return view('event.creat');
    }
    public function edit(){
        return view('event.edit');
    }

}
