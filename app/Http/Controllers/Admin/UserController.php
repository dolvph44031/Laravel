<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public const PATH_VIEW = 'admin.users.';
    public const PATH_UPLOAD = 'users';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|Factory|View
     */
    public function index()
    {
        $data = User::query()->latest('id')->paginate(5);
        return view(self::PATH_VIEW . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|Factory|View
     */
    public function create()
    {
        return view(self::PATH_VIEW . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required'],
        ],[
            'name.required' => 'Tên không được để bỏ trống',
            'email.required' => 'Email không được để bỏ trống',
            'password.required' => 'Mật khẩu không được để bỏ trống',
            'password_confirmation.required' => 'Nhập lại mật khẩu không được để bỏ trống',
        ]);
    
        // Hash the password
        $data['password'] = Hash::make($data['password']);
    
        // Create the user
        User::create($data);
        return redirect()->route('admin.users.index')->with('message', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|Factory|View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view(self::PATH_VIEW . 'show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|Factory|View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view(self::PATH_VIEW . 'edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('message', 'User được sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'User đã được xóa thành công');
    }
}
