<?php

namespace App\Http\Controllers\Code;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EventController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return $this->showAll($events);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
       return $this->showOne($event);
   }

   
}
