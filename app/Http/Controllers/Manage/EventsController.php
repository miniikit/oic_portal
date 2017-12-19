<?php

namespace App\Http\Controllers\Manage;

use App\Service\EventService;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventPostRequest;
use App\Service\CommonService;

class EventsController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        $events = $this->eventService->getAllEvents();
        return view('manage.event.list', compact('events'));
    }

    public function show($id)
    {
        $event = $this->eventService->getEvent($id);
        $eventParticipant = $this->eventService->getEventParticipant($id);
        return view('manage.event.detail', compact('id', 'event', 'eventParticipant'));
    }

    public function edit($id)
    {
        $event = $this->eventService->getEvent($id);
        $eventParticipant = $this->eventService->getEventParticipant($id);

        // フォームのvalue用フォーマットに変換
        $cm = new CommonService();
        $event->event_start_date_time = $cm->ChangeDateToFormFormat($event->event_start_date_time);
        $event->event_end_date_time = $cm->ChangeDateToFormFormat($event->event_end_date_time);

        return view('manage.event.edit', compact('id', 'event', 'eventParticipant', 'f'));
    }

    public function update(EventPostRequest $request, $id)
    {


        $event = $this->eventService->updateEvent($id, $request);
        return redirect()->name('manager_event_list');
        //dd($id,$request->all());
    }

    public function delete($id, Request $request)
    {
        //dd($id,$request->all());
    }
}
