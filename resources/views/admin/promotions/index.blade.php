@extends('admin.layouts.master')

@section('title')
    Danh sách khuyến mãi
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('admin.promotions.create') }}" class="btn btn-success mb-3">Tạo mới</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giảm giá</th>
                <th>Mã</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ number_format($item->discount_amount, 2) }} VNĐ</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Action Buttons">
                        <a href="{{ route('admin.promotions.show', $item) }}" class="btn btn-info mr-2">Xem</a>
                        <a href="{{ route('admin.promotions.edit', $item) }}" class="btn btn-success mr-2">Sửa</a>
                        <form action="{{ route('admin.promotions.destroy', $item) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')" style="display:inline;">
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

    <!-- Pagination -->
  
@endsection
