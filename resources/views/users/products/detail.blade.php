@extends('users.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-start">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div id="productCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <!-- Ảnh chính -->
                        <div class="product-image" style="width: 540px; height: 430px;">
                            <img src="{{ Storage::url($product->img_thumb) }}" alt="{{ $product->name }}"
                                class="d-block w-100" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    {{-- <a class="carousel-control-prev" href="#productCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a> --}}
                </div>

                <!-- Thumbnails -->
                <div class="d-flex mt-2">
                    @foreach ($product->galleries as $gallery)
                        <div class="thumb-wrapper">
                            <img src="{{ Storage::url($gallery->image) }}" alt="Thumbnail Image"
                                class="thumbnail img-thumbnail">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-lg-6 col-md-12">
                <div class="product-details">
                    <h2>{{ $product->name }}</h2>
                    <p class="text-muted">Mã sản phẩm: {{ $product->sku }}</p>
                    <p class="text-muted">Danh mục sản phẩm: {{ $product->category->name }}</p>

                    <div class="price mt-2">
                        <span class="text-danger h4">{{ $product->price_sale ?: $product->price }} VNĐ</span>
                        @if ($product->price_sale)
                            <span class="text-muted text-decoration-line-through ms-2">{{ $product->price }} VNĐ</span>
                        @endif
                    </div>
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Kích thước -->
                        <div class="mb-3">
                            <label class="form-label">Kích thước:</label>
                            <div class="btn-group-toggle" data-toggle="buttons">
                                @foreach ($sizes as $id => $name)
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="product_size_id" value="{{ $id }}"
                                            id="radio_size_{{ $id }}"> {{ $name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Màu sắc -->
                        <div class="mb-3">
                            <label class="form-label">Màu:</label>
                            <div class="btn-group-toggle" data-toggle="buttons">
                                @foreach ($colors as $id => $name)
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="product_color_id" value="{{ $id }}"
                                            id="radio_color_{{ $id }}"> {{ $name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                                value="1">
                        </div>

                        <!-- Nút thêm vào giỏ hàng và mua ngay -->
                        <!-- Nút thêm vào giỏ hàng và mua ngay -->
                        <div class="d-flex gap-2">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_size_id" value="{{ $id }}">
                                <input type="hidden" name="product_color_id" value="{{ $id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-primary btn-custom" type="submit">Thêm Vào Giỏ</button>
                            </form>

                            <form action="{{ route('cart.buyNow') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_size_id" value="{{ $id }}">
                                <input type="hidden" name="product_color_id" value="{{ $id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-success btn-custom" type="submit">Mua Ngay</button>
                            </form>
                        </div>

                        <!-- CSS inline hoặc trong tệp CSS -->
                        <style>
                            .btn-custom {
                                width: 160px;
                                /* Chiều rộng nút nhỏ hơn */
                                height:40px ;
                                padding: 5px;
                                /* Padding nhỏ */
                                font-size: 16px;
                                /* Kích thước chữ nhỏ hơn */
                            }

                            .d-flex {
                                align-items: center;
                                /* Căn giữa các nút theo chiều dọc */
                            }

                            form {
                                margin: 0;
                                /* Loại bỏ khoảng cách bên ngoài form */
                            }
                        </style>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <label for="">Mô tả</label>
            <input name="description" class="form-control" id="" cols="30" rows="10"
                value="{{ $product->description }}"></input>
        </div>
    </div>
@endsection

<!-- CSS -->
<style>
    .carousel-inner img {
        width: 100%;
        height: auto;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .product-details {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .price {
        font-size: 1.5rem;
    }

    .btn-outline-secondary {
        border-radius: 5px;
        margin-right: 5px;
    }

    .image-wrapper img {
        max-height: 400px;
        object-fit: cover;
    }

    .thumb-wrapper {
        flex: 1;
        margin: 2px;
    }

    .thumbnail {
        width: 100%;
        height: 430px;
        /* Adjust height for thumbnails */
        object-fit: cover;
    }
</style>

<!-- JavaScript (Bootstrap Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
