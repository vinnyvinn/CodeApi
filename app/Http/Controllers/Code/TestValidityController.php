<?php

namespace App\Http\Controllers\Code;

use App\Promocode;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TestValidityController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $rules = [
          'origin' => 'required',
          'destination' => 'required',
          'code' => 'required'
      ];

      $this->validate($request,$rules);

      $code = Promocode::all()->random()->radius;
      $checkStatus = Promocode::where('radius','=',$code)->first();
      if($checkStatus->status == 'active'){

       return $this->showOne($checkStatus);

   }

   return $this->errorResponse('Sorry, the promotion code specified is not valid, try again later.',404);


}

}
