<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.passwords.email');
    }
    public  function sendPasswordEmail(Request $data){
        $user = Sentinel::findByCredentials($data->all());
        if(is_null($user)){
            return redirect()->back();
        }else{
            $credentials['password'] = '321312';
            Sentinel::update($user, $credentials);
            dd($user);
            return view('messages.index')->with([
                'messages' => '',
            ]);
        }
        dd($user);
    }
}
