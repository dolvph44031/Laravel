<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function index()
    {
        // hiển thị view đăng ký
        return view('users.auth.register');
    }
    public function register(Request $request)
    {
        // hiển thị login đăng ký
        // dd($request->all);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', ' min:6', 'confirmed'],
            // ,'regex:/[A-Z]/','regex:/[!@#$%^&*(),.?":{}|<>]/'
        ]);

        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);

        // Tạo tài khoản
        $user = User::create($data);

        // Gửi email xác nhận
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($user->name, $token));
        return redirect()->intended('/'); // interded back lại trang trước khi đăng nhập tài khoản.
    }
    public function verify($token)
    {
        $email = base64_decode($token);
        $user = User::where('email', $email)->first();

        if ($user) {
            // Update user status to verified
            $user->update(['email_verified_at' => now()]);
            return redirect()->route('login')->with('status', 'Email đã được xác minh thành công! Bây giờ bạn có thể đăng nhập.');
        }

        return redirect()->route('login')->withErrors('Liên kết xác minh không hợp lệ.');
    }
}
