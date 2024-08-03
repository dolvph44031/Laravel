@extends('admin.layouts.master')

@section('title')
    Danh sách người dùng
@endsection

@section('content')
    @if(session('message'))
        <h4>{{session('message')}}</h4>
    @endif

    <a href="{{route('admin.users.create')}}">
        <button class="btn btn-success">Tạo mới</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phân Quyền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->type}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Action Buttons">
                        <a href="{{ route('admin.users.show', $item) }}" class="btn btn-info mr-2">Xem</a>
                        <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-success mr-2">Sửa</a>
                        <form action="{{ route('admin.users.destroy', $item) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
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
    {{$data->links()}}
@endsection