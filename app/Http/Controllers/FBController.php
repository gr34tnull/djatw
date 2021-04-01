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
            dd($exception->getMessage());
        }
            
        $isUser = User::where('fb_id', $user->getId())->firstOrCreate([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'fb_id' => $user->getId(),
                'password' => Hash::make('DJSatw2021'),
        ]);
     
        if($isUser){
            Auth::login($isUser);
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }

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

}
