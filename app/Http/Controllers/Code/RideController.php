<?php

namespace App\Http\Controllers\Code;

use App\Ride;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class RideController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rides = Ride::all();

        return $this->showAll($rides);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        return $this->showOne($ride);
    }


}
