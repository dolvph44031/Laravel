<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function  index()
    {
        //hiển thị form login
        return view('users.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'min:6', 'confirmed'],
        ], [
            'password.confirmed' => 'Mật khẩu không đúng hoặc không trùng nhau',
        ]);

        // dd($request->all());
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng đến trang home
            return redirect()->intended('home');
        }

        // Đăng nhập không thành công, quay lại với thông báo lỗi
        return redirect()->back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }



    public function logout()
    {
        //xử lý logout
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function verify($token)
    {
        $user = User::query()->where('email', base64_decode($token))
            ->where('email_verified_at', null)->first();
        if ($user) {
            $user->update(['email_verified_at' => Carbon::now()]);
            Auth::login($user);
            \request()->session()->regenerate();
            return redirect()->intended('/');
        }
    }
}
