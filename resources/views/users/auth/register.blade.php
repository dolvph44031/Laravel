@extends('users.layouts.app')
@section('content')
    <div class="mt-16">
        <h2>Đăng ký tài khoản</h2>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div>
                <label for="" class="form-label">Tên</label>
                <input type="text" class="form-control" name="name" id="">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="pt-3">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="pt-3">
                <label for="" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" name="password" id="">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="pt-3">
                <label for="" class="form-label">Nhập Lại Mật Khẩu</label>
                <input type="password" class="form-control" name="password_confirmation" id="">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-danger">Đăng Ký</button>
            </div>
        </form>
    </div>
@endsection
