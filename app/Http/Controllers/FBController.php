<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Validator;
use Exception;
use Auth;

class FBController extends Controller
{

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(Request $request)
    {

        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $exception) {
            return redirect('/');
        }
            
        $isUser = User::where('fb_id', $user->getId())->first();
     
        if($isUser){
            Auth::login($isUser);
            return redirect('/dashboard');
        } else {
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'fb_id' => $user->getId(),
                'password' => Hash::make('DJSatw2021')
            ]);
            return redirect('/dashboard');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disconnect()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $exception) {
            return redirect('/');
        }
        
        User::where('fb_id', $user->id)->delete();
        return redirect('/');
    }

}
