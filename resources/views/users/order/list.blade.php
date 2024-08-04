@extends('users.layouts.master')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" class="">
                    <h6 class="text-center mt-4">Thông tin đặt hàng</h6>
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-3" placeholder="Vui lòng nhập số điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control mt-3 rounded-3" placeholder="Vui lòng nhập địa chỉ email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control mt-3 rounded-3" placeholder="Vui lòng nhập tên của bạn" required>
                    </div>
                    
                    <h6 class="text-center mt-4">Chọn cách thức giao hàng</h6>
                    <div class="d-flex justify-content-between ms-3 mb-3">
                        <div>
                            <input class="form-check-input" type="radio" name="delivery_method" id="store_pickup" value="store_pickup" required>
                            <label for="store_pickup">Nhận tại cửa hàng</label>
                        </div>
                        <div>
                            <input class="form-check-input" type="radio" name="delivery_method" id="home_delivery" value="home_delivery" required>
                            <label for="home_delivery">Giao hàng tận nơi</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <input type="text" class="form-control rounded-3" placeholder="Hà Nội" required>
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" class="form-control rounded-3" placeholder="Quận/huyện" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-3" placeholder="Chọn địa chỉ cửa hàng" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-3" placeholder="Phường/Xã" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-3" placeholder="Số nhà/tòa nhà" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-3 text-black-50" placeholder="Yêu cầu khác">
                    </div>
                    
                    <h6 class="mt-4">Phương thức thanh toán:</h6>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" required>
                        <label for="cod">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" required>
                        <label for="credit_card">Thẻ tín dụng</label>
                    </div>
                    
                    <div class="border border-2 rounded-4 text-center mt-4 p-3">
                        <div class="text-center mt-4">
                            <h5 class="">Tổng tiền tạm tính: <span class="text-danger ms-2"></span></h5>
                        </div>
                        <div class="container d-flex justify-content-center">
                            <a href="" class="btn btn-outline-primary mb-3 mt-3">Tiến hành đặt Hàng</a>
                        </div>
                        <div class="container d-flex justify-content-center">
                            <a href="{{route('home')}}" class="btn btn-outline-secondary mb-3">Chọn thêm sản phẩm khác</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</main>
@endsection
