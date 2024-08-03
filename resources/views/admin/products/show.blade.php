@extends('admin.layouts.master')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="container">
        {{-- <h1 class="mb-4">Chi tiết sản phẩm</h1> --}}

        <!-- Product Information -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0 font-weight-bold">Thông tin sản phẩm</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ Storage::url($product->img_thumb) }}" alt="Ảnh sản phẩm" class="img-fluid mb-3" style="border-radius: 8px;">
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $product->name }}</h3>
                        <p><strong>ID:</strong> {{ $product->id }}</p>
                        <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không xác định' }}</p>
                        <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <p><strong>Giá sale:</strong> {{ number_format($product->price_sale, 0, ',', '.') }} VND</p>
                        <p><strong>Trạng thái:</strong> 
                            {!! $product->is_active ?'<span class="badge bg-success text-white">Hoạt động</span>'
                                : '<span class="badge bg-danger text-white">Không hoạt động</span>'!!}
                        </p>
                        <p><strong>Slug:</strong> {{ $product->slug }}</p>
                        <p><strong>SKU:</strong> {{ $product->sku }}</p>
                        <p ><strong>Is Best Sale:</strong> 
                            {!! $product->is_best_sale ?'<span class="badge bg-success text-white">Có</span>'
                                : '<span class="badge bg-danger text-white">Không</span>'!!}
                        </p>
                        <p><strong>Is 40% Sale:</strong>  {!! $product->is_40_sale ?'<span class="badge bg-success text-white">Có</span>'
                                : '<span class="badge bg-danger text-white">Không</span>'!!}</span></p>
                        <p><strong>Is Hot Online:</strong> {!! $product->is_hot_online ?'<span class="badge bg-success text-white">Có</span>'
                                : '<span class="badge bg-danger text-white">Không</span>'!!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0 font-weight-bold">Ảnh sản phẩm</h5>
            </div>
            <div class="card-body">
                @if($product->galleries->isEmpty())
                    <p class="text-muted">Chưa có ảnh nào cho sản phẩm này.</p>
                @else
                    <div class="row">
                        @foreach($product->galleries as $gallery)
                            <div class="col-md-3 mb-3">
                                <img src="{{ Storage::url($gallery->image) }}" alt="Ảnh gallery" class="img-thumbnail" style="max-width: 100%; height: auto;">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <!-- Product Variants -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0 font-weight-bold">Biến thể sản phẩm</h5>
            </div>
            <div class="card-body">
                @if($product->variants->isEmpty())
                    <p class="text-muted">Chưa có biến thể nào cho sản phẩm này.</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Màu</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->variants as $variant)
                                <tr>
                                    <td>{{ $variant->size->name ?? 'Không xác định' }}</td>
                                    <td>{{ $variant->color->name ?? 'Không xác định' }}</td>
                                    <td>
                                        @if($variant->image)
                                            <img src="{{ Storage::url($variant->image) }}" alt="Ảnh biến thể" class="img-thumbnail" style="width: 100px; height: auto;">
                                        @else
                                            Không có ảnh
                                        @endif
                                    </td>
                                    <td>{{ $variant->quantity }}</td>
                                    <td>{{$variant->price}} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Product Galleries -->
       

        <!-- Debug Information -->
        {{-- <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0 font-weight-bold">Thông tin Debug</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    @foreach($product->toArray() as $key => $value)
                        <li><strong>{{ $key }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
    </div>
@endsection
