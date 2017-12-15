<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('');
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
