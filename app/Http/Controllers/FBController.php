<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use Exception;
use Auth;

class FBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(Request $request)
    {
        try {
            $userSocial = Socialite::driver('facebook')->stateless()->user();
        } 
        catch (Exception $e) {
            return redirect ('/');
        }
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }
    
        //$userSocial =   Socialite::driver($provider)->stateless()->user();
        $user = User::where(['fb_id' => $userSocial->getId()])->firstOrCreate([
            'fb' => $userSocial->getId(),
            'name' => $userSocial->getName(),
            'email' => $userSocial->getEmail(),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disconnect()
    {
        $user = Socialite::driver('facebook')->user();
        User::where('fb_id', $user->id)->delete();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
