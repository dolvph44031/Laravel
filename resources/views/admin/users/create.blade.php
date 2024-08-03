@extends('admin.layouts.master')

@section('content')
    <div class="mt-16">
        <h2>Đăng ký tài khoản</h2>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-3 position-relative">
                <label for="password" class="form-label">Mật Khẩu</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-eye password-toggle" id="password-toggle"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-3 position-relative">
                <label for="password_confirmation" class="form-label">Nhập Lại Mật Khẩu</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-eye password-toggle" id="password-confirmation-toggle"></i>
                        </span>
                    </div>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-primary">Đăng Ký</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection

