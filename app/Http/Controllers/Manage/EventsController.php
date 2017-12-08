<?php

namespace App\Http\Controllers\Manage;

use App\Service\EventService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('manage.event.list',compact('events'));
    }

    public function show($id)
    {
        $event = $this->eventService->getEvent($id);
        $eventParticipant = $this->eventService->getEventParticipant($id);
        return view('manage.event.detail',compact('id','event','eventParticipant'));
    }

    public function edit($id)
    {
        $event = $this->eventService->getEvent($id);
        $eventParticipant = $this->eventService->getEventParticipant($id);
        return view('manage.event.edit',compact('id','event','eventParticipant'));
    }

    public function update($id,Request $request)
    {
        $event = $this->eventService->updateEvent($id,$request);

        //dd($id,$request->all());
    }

    public function delete($id,Request $request)
    {
        //dd($id,$request->all());
    }
}
