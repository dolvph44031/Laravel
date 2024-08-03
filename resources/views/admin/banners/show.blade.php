@extends('admin.layouts.master')

@section('title')
    Cập nhật banner
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="mb-3">
            <label for="">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{$banner->title}}" disabled>
        </div>
        <div class="mb-3">
            <label for="">Ảnh:</label>
            <input type="file" name="image" class="form-control">
            <div style="width: 50px;height: 50px;">
                <img src="{{Storage::url($banner->image)}}" style="max-width: 100%; max-height: 100%;" alt="" disabled>
            </div>
        </div>
        <div class="mb-3">
            <label for="">Mô tả:</label>
            <input type="text" name="description" class="form-control" value="{{$banner->description}}" disabled>
        </div>
        {{-- <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="is_active" value="1" name="is_active" @checked($category->is_active)>
            <label class="form-check-label" for="is_active">
                Trạng thái
            </label>
        </div> --}}
        <div class="pt-4">
            {{-- <button type="submit" class="btn btn-primary">Cập nhật</button> --}}
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
@endsection