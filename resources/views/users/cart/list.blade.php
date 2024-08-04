@extends('users.layouts.master')
@section('content')
<div class="container mt-4">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productVariants as $item)
                <tr>
                    <td>{{ $item->product_variant_id }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="bg-light rounded d-flex justify-content-center align-items-center"
                                style="width: 60px; height: 50px;">
                                <img src="{{ Storage::url($item->product_img_thumb) }}" alt="{{ $item->product_name }}" class="mh-100 mw-100">
                            </div>
                            <p class="ms-3">{{ $item->product_name }}</p>
                        </div>
                    </td>
                    <td>{{ number_format($item->product_price_sale ?: $item->product_price) }} đ</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="text-black" onclick="decreaseQuantity({{ $item->product_variant_id }})"><i class="fa-solid fa-minus"></i></a>
                            <p>{{ $item->quantity }}</p>
                            <a href="#" class="text-black" onclick="increaseQuantity({{ $item->product_variant_id }})"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger ms-2" onclick="onClickDelete({{ $item->product_variant_id }})"><i class="fa-solid fa-trash"></i> Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">
    <div class="d-flex justify-content-center mt-4">
        <div class="col-6 d-flex justify-content-between">
            <div class="d-flex">
                <i class="fa-solid fa-file fs-2"></i>
                <p class="ms-3">Mã giảm giá</p>
            </div>
            <p>Chọn hoặc nhập mã</p>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="container mt-3">
                <form action="" method="POST" class="border border-2 rounded-4 text-center">
                    @csrf
                    <div class="d-flex justify-content-center mt-3">
                        <h5 class="">Tổng tiền tạm tính:</h5>
                        <h5 class="text-danger ms-3">{{ number_format($totalAmount) }} V</h5>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary mb-3 mt-4" style="width: 210px;">Đặt Hàng</button>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-3">Chọn thêm sản phẩm khác</a>
                    </div>                    
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function decreaseQuantity(id) {
        fetch(`/cart/decrease/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Reload to reflect changes
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function increaseQuantity(id) {
        fetch(`/cart/increase/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Reload to reflect changes
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function onClickDelete(id) {
        if (confirm('Are you sure you want to delete this item?')) {
            fetch(`/cart/delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id: id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload to reflect changes
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>
@endsection


