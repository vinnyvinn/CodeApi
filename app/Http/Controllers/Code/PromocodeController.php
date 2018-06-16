<?php

namespace App\Http\Controllers\Code;

use App\User;
use App\Promocode;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PromocodeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Promocode::all();

        return $this->showAll($codes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
      
        
        $rules = [
            'code' => 'required',
            'radius' => 'required',
            'status' => 'required'

        ];

        $this->validate($request,$rules);
        $newCode = $request->all();
        $newCode['user_id'] = User::all()->random()->id;
        Promocode::create($newCode);

        return response()->json(['data' => $newCode],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function show(Promocode $promocode)
    {
      
      return $this->showOne($promocode);
  }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocode $promocode)
    {
      

       if($request->has('radius')){
        $promocode->radius = $request->radius;
    }
    
    if($request->has('code')){
        $promocode->code = $request->code;
    }

    if($request->has('status')){
        $promocode->status = $request->status;
    }

    if($promocode->isClean()){
        return $this->errorResponse('Sorry, you need to specify a different value to update',422);
    }

    $promocode->save();

    return $this->showOne($promocode);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocode $promocode)
    {
     $promocode->delete();

     return $this->showOne($promocode);
 }
}
