@extends('users.layouts.master')

@section('content')
<div class="container-fluid mt-2">
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($banners as $index => $banner)
                <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($banners as $index => $banner)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url($banner->image) }}" class="d-block w-100" style="height: 420px;" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<h4 class="mt-4">Sản Phẩm Hot</h4>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-4">
    <div class="row">
        @foreach ($products->slice(0, 8) as $product)
            <div class="col-md-3 mb-2">
                <div class="card h-100">
                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="d-flex align-items-center justify-content-center overflow-hidden" style="height: 200px;">
                        <img src="{{ Storage::url($product->img_thumb) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; width: 100%; height: 100%;">
                    </a>
                    <div class="card-body text-center">
                        <h6 class="card-title mb-2" style="font-weight: bold; font-size: 16px;">
                            {{ $product->name }}
                        </h6>
                        <div class="mb-2">
                            @if ($product->is_active)
                                <span class="badge bg-success">Còn hàng</span>
                            @else
                                <span class="badge bg-danger">Hết hàng</span>
                            @endif
                        </div>
                        <div class="mt-1">
                            @if ($product->price_sale)
                                <div class="price">
                                    <span class="text-muted text-decoration-line-through d-block mb-1" style="font-size: 14px;">
                                        {{ number_format($product->price, 0, ',', '.') }} VNĐ
                                    </span>
                                    <span class="text-danger" style="font-size: 18px; font-weight: bold;">
                                        {{ number_format($product->price_sale, 0, ',', '.') }} VNĐ
                                    </span>
                                </div>
                            @else
                                <div class="price">
                                    <span class="text-dark" style="font-size: 18px; font-weight: bold;">
                                        {{ number_format($product->price, 0, ',', '.') }} VNĐ
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="card-footer d-flex justify-content-between">
                        <form action="{{ route('cart.add') }}" method="POST" class="d-flex flex-grow-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_size_id" value="{{ $product->size_id }}">
                            <input type="hidden" name="product_color_id" value="{{ $product->color_id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fas fa-shopping-cart me-1"></i> Mua Ngay
                            </button>
                        </form>
                        <a href="{{ route('cart.add', ['product_id' => $product->id, 'product_size_id' => $product->size_id, 'product_color_id' => $product->color_id, 'quantity' => 1]) }}" class="btn btn-outline-secondary ms-2">
                            <i class="far fa-heart"></i>
                        </a>                            
                    </div>
                           
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
