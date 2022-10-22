<?php

namespace App\Http\Controllers;

use Captcha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    private $_WaitingNextLogin;

    public function __construct()
    {
        $this->_WaitingNextLogin = 30;
    }

    public function Index()
    {
        if (!auth()->check()) {
            return view('Login.index');
        } else {
            return redirect()->back();
        }
    }

    public function authenticate(Request $request)
    {
        // $counter = 0;
            // if(Session::get("try-login") == null){ Session::make('try-login', $counter, 60); }
            
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);

            if (!$validator->fails()) {

                $credentials = $request->validate([
                    'name' => ['required'],
                    'password' => ['required']
                ]);

                if(RateLimiter::tooManyAttempts('login', 2)){
                    return back()->with(['TooManyAttempt' => 'You Cannot Login Until: '. $this->_WaitingNextLogin . ' seconds', 'WaitingNextLogin' => $this->_WaitingNextLogin]);
                }

                if (Auth::attempt($credentials)){
                    $request->session()->regenerate();
                    Auth::login(auth()->user());
                    return redirect()->intended('/');
                }
            
                // $request->session()->increment('try-login');
                RateLimiter::hit('login');

                return back()->withErrors([
                    'name' => 'The provided credentials do not match our records.',
                ]);
            } else {
                return back()->withErrors(['captcha.captcha' => 'Enter valid captcha code shown in image']);
            }
    }

    public function Register()
    {
        if (!auth()->check()) {
            return view('Login.Register');
        } else {
            return redirect()->back();
        }
    }

    public function Registration(Request $request)
    {
        $rules = ['captcha' => ['required', 'captcha']];
        $validator = validator()->make(request()->all(), $rules);

        if (!$validator->fails()) {

            Validator::make($request->all(), [
                'name' => ['required'],
                'password' => ['required', Password::min(10)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()]
            ], [
                'required' => ':attribute Tidak Boleh Kosong',
                // 'required' => 'The :attribute provided credentials do not match our records.',
            ])->validate();

            $credentials = [
                "name" => $request->input("name"),
                "password" => bcrypt($request->input("password"))
            ];

            $user = User::where('name', $request->input("name"));
            if ($user->first() == null) {
                $user = User::create($credentials);
                Session::flash('message', 'Akun berhasil di buat!. Silakan Login');
                Session::flash('alert-class', 'alert-success');
                return view("Login.Index");
            }
            return back()->withErrors(['user' => 'Another Username. Already Exist!']);
        } else {
            return back()->withErrors([
                'captcha' => 'Wrong Captcha',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/Login');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => Captcha::img()]);
    }

    public function CheckingCounter()
    {
        $tryLoginCount = Session::get('try-login');
        if ($tryLoginCount != null && $tryLoginCount == 3) {
            Session::put('try-login', 10);
            return response()->json(["status" => false, "message" => "Cannot Login. Wait for " . $tryLoginCount]);
        } else {
            return response()->json(["status" => true, "message" => "Login"]);
        }
    }

    public function ResetPassword()
    {
        if (!auth()->check()) {
            return view('Login.Reset-Password');
        } else {
            return redirect()->back();
        }
    }
    public function ResettingPassword(Request $request)
    {
        $rules = ['captcha' => ['required', 'captcha']];
        $validator = validator()->make(request()->all(), $rules);

        if (!$validator->fails()) {

            Validator::make($request->all(), [
                'name' => ['required'],
                'password' => ['required', Password::min(10)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()]
            ], [
                'required' => ':attribute Tidak Boleh Kosong',
                // 'required' => 'The :attribute provided credentials do not match our records.',
            ])->validate();

            $credentials = [
                "name" => $request->input("name"),
                "password" => bcrypt($request->input("password"))
            ];
            
            $user = User::where('name', $request->input("name"));
            if ($user->first() != null) {
                
                $user = $user->first();
                
                $user->password = bcrypt($request->input('password'));
                $user->save();

                Session::flash('message', 'Password akun berhasil di buat!. Silakan Login ulang');
                Session::flash('alert-class', 'alert-success');
                return view("Login.Index");
            }
            return back()->withErrors(['user' => 'User Not Found!']);
        } else {
            return back()->withErrors([
                'captcha' => 'Wrong Captcha',
            ]);
        }
    }

    public function CheckingExistingUser(Request $request){ 
        $status = false;
        $user = User::where('name', $request->input("name"))->first();
        
        $status = $user == null ? false : true;
        $message = $user == null ? 'User Not Found' : "";
        $data = [
            'status' => $status,
            'message' => $message,
        ];
        return response()->json($data);
    }
}
