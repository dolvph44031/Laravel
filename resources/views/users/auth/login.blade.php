@extends('users.layouts.app')
@section('content')
    <div class="mt-16">
        <h2 class="text-center">Đăng Nhập</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
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
            <div class="d-flex justify-content-center pt-4">
                <button type="submit" class="btn btn-danger text-center">Đăng Nhập</button>
            </div>
            <div class="d-flex justify-content-center  mt-2">
                <p>Bạn chưa có tài khoản?</p>
                <a href="{{route('register')}}" class="text-decoration-none">Đăng ký ngay</a>
            </div>
        </form>
    </div>
    <div class="container text-center mb-2 text-success mt-2 ">
        <p>dolvph44031@fpt.edu.vn</p>
    </div>
@endsection
