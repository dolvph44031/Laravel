@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('admin.categories.create') }}">
        <button class="btn btn-success">Tạo mới</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <div style="width: 80px;height: 80px;">
                            <img src="{{ Storage::url($item->cover) }}" style="max-width: 100%; max-height: 100%;"
                                alt="">
                        </div>
                    </td>
                    <td>
                        {!! $item->is_active
                            ? '<span class="badge bg-success text-white">Hoạt động</span>'
                            : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <a href="{{ route('admin.categories.show', $item) }}" class="btn btn-info mr-2">Xem</a>
                            <a href="{{ route('admin.categories.edit', $item) }}" class="btn btn-success mr-2">Sửa</a>
                            <form action="{{ route('admin.categories.destroy', $item) }}" method="POST"
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
