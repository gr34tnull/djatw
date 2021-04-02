<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use App\Mail\VerifiedDJ;
use App\Mail\RejectedDJ;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public $countries;

    public function __construct()
    {
        $countries = new Countries();
        $this->countries = $countries->all()->pluck('name.common')->toArray();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('admin',false)->get();
        return view('users.index',compact('users'));
    }

    public function search(Request $request)
    {
        $users = User::search($request->get('search'))->where('admin',0)->get();
        return view('users.index',compact('users'));
    }

    public function publicPayment()
    {
        return view('users.payment');
    }

    public function payment($id)
    {
        if(auth()->check())
        {
            if(auth()->user()->admin == 0 && !is_null(auth()->user()->email_verified_at))
            {
                $user = auth()->user();
                return view('users.payment',compact('user'));
            } else {
                return redirect('/dashboard');
            }
        } else {
            $user = User::findorFail($id);
            Auth::login($user);
            return redirect('/cdjvpayment/'.$user->id);
        }
    }

    public function success()
    {
        return view('payments.success');
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
    public function update(Request $request, User $user)
    {
        if($request->has('email_verified_at'))
        {
            $user->email_verified_at = is_null($request->email_verified_at) ? $this->SendVerification($user) : null;
            $user->save();
        } else {
            $user->fill($request->all())->save();
        }
        return redirect('/dashboard');
    }

    public function SendVerification(User $user)
    {
        Mail::to($user->email)->send(new VerifiedDJ($user->id));
        return date("Y-m-d");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Mail::to($user->email)->send(new RejectedDJ());
        $user->delete();
        return redirect('/users');
    }
}
