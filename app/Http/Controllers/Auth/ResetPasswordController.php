<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Validator;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
    }

    public function passwordResetEmail(Request $request){
        $validator = \Validator::make($request->all(), [
            'email'  => 'required|email|max:255|exists:users,email',
            'recaptcha_token' => 'required',
        ]);
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.captcha.secret'),
            'response' => $request->recaptcha_token,
        ]);
        $success = true;

        if ($validator->fails())
        {
            $success = false;
        }

        $reset_pass_email = $request->email;
        //$from_email = getenv('MAIL_FROM_ADDRESS');
        //$from_name = getenv('MAIL_FROM_NAME');
        //        $to_email = getenv('TO_EMAIL');
        
        $from_email = "noreply@myisoonline.com";
        $from_name = "noreply@myisoonline.com";
        $to_email = "info@isoonline.com";


        if ($success && !empty($from_email) && !empty($from_name) && $to_email){
            Mail::send([], [], function ($message) use ($from_email,$from_name,$to_email,$reset_pass_email) {
                $message->to($to_email,'Admin')
                    ->from($from_email,$from_name)
                    ->subject('إشعار إعادة تعيين كلمة المرور')
                    ->setBody(
                        '<br>
                <h3>مرحبا، المسؤول!</h3>
                <br>
                <p>يرجى إعادة تعيين كلمة المرور لهذا البريد الإلكتروني. <b>'.$reset_pass_email.'</b></p>
                <br>
                <h4>شكرا لك!</h4>
                <h4><a href="https://www.myisoonline.com/">Myisoonline.com</a></h4>',
                        'text/html'); // for HTML rich messages
            });
        }

        return response()->json(array(
            'success' => $success,
        ));
    }
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

//    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
}
