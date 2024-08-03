@extends('admin.layouts.master')

@section('title')
    Tạo mới danh mục
@endsection

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên danh mục">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Ảnh:</label>
            <input type="file" id="cover" name="cover" class="form-control">
            @error('cover')
                    <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="is_active" value="1" name="is_active" checked>
            <label class="form-check-label" for="is_active">
                Trạng thái
            </label>
        </div>

        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection
