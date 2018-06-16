<?php

namespace App\Http\Controllers\Code;

use App\Promocode;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ActiveCodesController extends APiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activecodes = Promocode::where('status','=','active')->get();

        return $this->showAll($activecodes);
    }

    
}
