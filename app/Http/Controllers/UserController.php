<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Repositories\LoginRepository;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRepository $loginRepository, LoginRequest $loginRequest)
    {
        $loginRepository->save($loginRequest);
    	return redirect('/administration');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return back();
    }

    /**
     * to connect a user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRepository $loginRepository, LoginRequest $loginRequest)
    {
        if($loginRepository->login($loginRequest))
        {
            session(['authentificated'=>'yes']);
            session(['login'=>$loginRequest->login]);
            if($loginRequest->input('login') == "admin" | $loginRequest->input('password')=="mek00so")
            session(['admin'=>'yes']);
            session(['register'=>'yes']);    
            return redirect('/');
        }
        else
        session(['authentificated'=>'no']);
        return redirect('/');
    }


    /**
     * to log out a user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logOut(LoginRequest $loginRequest)
    {
        
        $loginRequest->session()->flush();
        return redirect('/');
    }
    

}
