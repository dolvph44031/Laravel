@extends('admin.layouts.master')

@section('title')
    Cập nhật danh mục
@endsection

@section('content')
    <form action="{{route('admin.categories.update', $category)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>
        <div class="mb-3">
            <label for="">Ảnh:</label>
            <input type="file" name="cover" class="form-control">
            <div style="width: 50px;height: 50px;">
                <img src="{{Storage::url($category->cover)}}" style="max-width: 100%; max-height: 100%;" alt="">
            </div>
        </div>
        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="is_active" value="1" name="is_active" @checked($category->is_active)>
            <label class="form-check-label" for="is_active">
                Trạng thái
            </label>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection