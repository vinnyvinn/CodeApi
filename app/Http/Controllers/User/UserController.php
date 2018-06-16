<?php

namespace App\Http\Controllers\User;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();

         return $this->showAll($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = ['name' => 'required',
                  'email' => 'required|email|unique:users',
                  'password' => 'required|min:6|confirmed'
        ];

        $this->validate($request,$rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        
        $user=User::create($data);

        return $this->showOne($user);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       
        return $this->showOne($user);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
             $rules = [
                  'email' => 'email|unique:users,email,'.$user->id,
                  'password' => 'min:6|confirmed'

        ];

        $this->validate($rules,$request);

        if($request->has('name')){
            $user->name = $request->name;
        }
        
        if($request->has('email')){
            $user->email = $request->email;
        }

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        if(!$user->isDirty()){

        return $this->errorResponse('You need to specify a different value to update',422);
        }

        $user->save();

        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
     
        $user->delete();

        return $this->showOne($user);

    }
}
