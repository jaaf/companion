<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Mail\PasswordResetLinkMail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    /*REGISTER*/
    public function registerOld(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
        ]);

        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    //ne retourne rien
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        return response(['user' => $user]);
    }

    /*LOGIN*/


    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            //$request->session()->regenerate();
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }
        return response()->json(Auth::user(), 200);


        // throw ValidationException::withMessages([
        //  'email' => ['The provided credentials are incorrect.']
        // ]);
    }

    /*LOGOUT*/

    public function logout()
    {
        Auth::guard('web')->logout();
    }
    public function requestPassword(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|string',
        ]);
        //look for a pair token email that matches email
        $item = PasswordReset::where('email', $credentials['email'])->first();
        if (!$item) {
            //create a new association token email
            $item = new PasswordReset();
        }
        //generate random string
        $token = openssl_random_pseudo_bytes(16);
        //change binary to hexadecimal
        $token = bin2hex($token);


        $item->email = $credentials['email'];
        $item->token = $token;
        $item->save();

        //check if user exists in database
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return response(['error' => 'Sorry! There is no user in our database with this email. Please register instead or check your email.']);
        }

        $link = env('APP_API_DEV_URL') . 'resetpassword/' . urlencode($item->token);

        $mailable = new PasswordResetLinkMail($link);
        // return $mailable;
        Mail::to($credentials['email'])->send($mailable);

        return response(['success' => "A mail has been sent to " . $credentials['email'] .  " with this link : " . $link], status: 200);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|string',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ]
        ]);
        $email = $data['email'];
        $token = $request['token'];

        $newuser = User::where('email', $email)->first();
        $newuser->password = bcrypt($data['password']);

        $resetPass = PasswordReset::where('token', $token)->where('email', $email)->first();
        if ($resetPass) {
            //token and email match
            $resetPass->token = '';
            $resetPass->save();
            $newuser->save();
            $token = $newuser->createToken('main')->plainTextToken;
            return ['user' => $newuser, 'token' => $token];
        }
        return (['error' => 'Are you sure you used the last link and submitted good email?']);
    }
}
