@extends('admin.layouts.master')

@section('title')
    Tạo mới banner
@endsection

@section('content')
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Tên:</label>
            <input type="text" id="name" name="title" class="form-control" placeholder="Nhập tiêu đề banner">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh:</label>
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả:</label>
            <input type="text" id="description" name="description" class="form-control">
            @error('description')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        {{-- <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="is_active" value="1" name="is_active" checked>
            <label class="form-check-label" for="is_active">
                Trạng thái
            </label>
        </div> --}}

        <div class="pt-4">
            <button type="submit" class="btn btn-primary">Tạo Mới</button>
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
@endsection
