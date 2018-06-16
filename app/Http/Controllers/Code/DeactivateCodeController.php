<?php

namespace App\Http\Controllers\Code;

use App\Promocode;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DeactivateCodeController extends ApiController
{
  

 
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $promocode = Promocode::findOrFail($id);
     
     $promocode['status'] = Promocode::CODE_INACTIVE;

     $promocode->save();

     return $this->showOne($promocode);
   }

   
 }
