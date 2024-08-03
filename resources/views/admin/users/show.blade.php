@extends('admin.layouts.master')

@section('content')
    <div class="mt-16">
        <h2>Chi Tiết Tài Khoản</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control" name="name" id="name" disabled value="{{ old('name', $user->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" disabled
                    value="{{ old('email', $user->email) }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-3">
                <label for="type" class="form-label">Phân Quyền</label>
                <select class="form-control" name="type" id="type" disabled>
                    <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="member" {{ $user->type == 'member' ? 'selected' : '' }}>Member</option>
                </select>
            </div>
            <div class="pt-3 position-relative">
                <label for="password" class="form-label">Mật Khẩu</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="password" placeholder="********" disabled>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-eye password-toggle" id="password-toggle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                {{-- <button type="submit" class="btn btn-primary">Cập Nhật</button> --}}
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection
