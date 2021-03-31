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

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(Request $request)
    {

        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->getId())->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'fb_id' => $user->getId()
                ]);
    
                Auth::login($createUser);
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
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
