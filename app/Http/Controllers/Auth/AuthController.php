<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register_page(){
        return view('auth.register');
    }

    public function login_form(){
        return view('auth.login');
    }

    public function store_register(Request $request){
        $password= md5($request['password']);
        $code = random_int(0000 , 9999);
        $encodedOTP = md5($code);
        
        Log::info('otp = ' . $code);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'status' => 'active',
            'otp' => $encodedOTP,
            'password' => $password
        ]);

        return redirect()->route('verification', $user)->with('message', 'verification email send successfully');
    }

    public function verification_page($user){
        return view('auth.verification', [
            'user' => $user
        ]);
    }

    public function verifyOtp(Request $request, $userId) {
       
        $user = User::find($userId);
        
        if (!$user) {
            return redirect()->route('/')->with('error', 'User not found.');
        }
    
        $databaseOTP = $user->otp;

        $inputOTP = md5($request['otp']) ;

        if ($databaseOTP === $inputOTP) {
            $user->email_verified_at = now();
            $user->otp = '';
            $user->save();
    
            return redirect()->route('login-form')->with('success', 'Email verified successfully.');
        } else {
            return back()->with('failed', 'invalid otp');
        }
    }

    public function login(Request $request){
        
        $encPassword = md5($request['password']);

        if (Auth::attempt(['email'=>$request->email, 'password' => $encPassword])) {
           $user = Auth::user();
           
            $success = $user->name;

            return redirect()->route('product.index')->with('login', 'login successfull');
        } else {
            return back()->with('failed', '! Invalid credentials !');
        }
        
    }
}
