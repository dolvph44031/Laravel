@extends('admin.layouts.master')

@section('title')
    Tạo mới sản phẩm
@endsection

@section('style-libs')
    <!-- Plugins css -->
    <link href="{{ asset('theme/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('script-libs')
    <!-- ckeditor -->
    <script src="{{ asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <!-- dropzone js -->
    <script src="{{ asset('theme/admin/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('theme/admin/js/create-product.init.js') }}"></script>
@endsection

@section('content')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!--   left content-->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Main products information -->
                    <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductInfo">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Tên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="product-title-input" placeholder="Tên sản phẩm"
                                       name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Giá</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="product-title-input" placeholder="Giá sản phẩm"
                                       name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product-title-input" class="form-label">Giá sale</label>
                                <input type="text" class="form-control @error('price_sale') is-invalid @enderror" id="product-title-input" placeholder="Giá giảm"
                                       name="price_sale" value="{{ old('price_sale') }}">
                                @error('price_sale')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Description</label>
                                <div id="ckeditor-classic" name="description">
                                    <!-- Description field, you might need to handle this part differently -->
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Ảnh sản phẩm</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseProductGallery">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Ảnh sản phẩm</h5>
                                <p class="text-muted">Thêm ảnh sản phẩm</p>
                                <input type="file" name="img_thumb" class="form-control @error('img_thumb') is-invalid @enderror">
                                @error('img_thumb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <h5 class="fs-14 mb-1">Thư viện ảnh</h5>
                                <p class="text-muted">Thêm thư viện ảnh sản phẩm</p>
                                <input type="file" name="product_galleries[]" multiple class="form-control @error('product_galleries') is-invalid @enderror">
                                @error('product_galleries')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Variants -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseProductVariants" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Biến thể sản phẩm</h6>
                    </a>
                    <div class="collapse show" id="collapseProductVariants">
                        <div class="card-body">
                            <div class="mb-4">
                                <table class="table">
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
                                    @php $rows = 5; @endphp
                                    @for($index = 1; $index <= $rows; $index++)
                                        <tr>
                                            <td>
                                                <select name="product_variants[{{$index}}][size]" class="form-control @error('product_variants.*.size') is-invalid @enderror">
                                                    @foreach($sizes as $size_id => $size_name)
                                                        <option value="{{ $size_id }}" {{ old("product_variants.$index.size") == $size_id ? 'selected' : '' }}>{{ $size_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("product_variants.$index.size")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <select name="product_variants[{{$index}}][color]" class="form-control @error('product_variants.*.color') is-invalid @enderror">
                                                    @foreach($colors as $color_id => $color_name)
                                                        <option value="{{ $color_id }}" {{ old("product_variants.$index.color") == $color_id ? 'selected' : '' }}>{{ $color_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("product_variants.$index.color")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="file" name="product_variants[{{$index}}][image]" class="form-control @error('product_variants.*.image') is-invalid @enderror">
                                                @error("product_variants.$index.image")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[{{$index}}][quantity]" class="form-control @error('product_variants.*.quantity') is-invalid @enderror" min="0" value="{{ old("product_variants.$index.quantity") }}" >
                                                @error("product_variants.$index.quantity")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="number" name="product_variants[{{$index}}][price]" class="form-control @error('product_variants.*.price') is-invalid @enderror" step="0.01" min="0" value="{{ old("product_variants.$index.price") }}" >
                                                @error("product_variants.$index.price")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                                <button class="btn btn-info">Thêm biến thể</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-success w-sm">Submit</button>
                </div>
            </div>
            <!-- end left content    -->
            <!-- right content          -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseStatus" class="d-block card-header py-3" data-toggle="collapse"
                       role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Trạng thái sản phẩm</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseStatus">
                        <div class="card-body">
                            <label for="choices-category-input" class="form-label">Danh mục sản phẩm</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" aria-label="Default select example"
                                    id="choices-category-input" name="category_id">
                                @foreach($categories as $id => $name)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                            <select class="form-control form-select-lg mb-3 @error('is_active') is-invalid @enderror" id="choices-publish-status-input"
                                    aria-label="Default select example" name="is_active">
                                <option selected>--Chọn trạng thái--</option>
                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @php
                                $types = [
                                    'is_best_sale' => 'Bán chạy',
                                    'is_40_sale' => 'Giảm 40%',
                                    'is_hot_online' => 'Hot online',
                                ];
                            @endphp
                            <label for="choices-publish-type-input" class="form-label">Loại sản phẩm</label>
                            <div class="d-flex align-items-center">
                                @foreach($types as $key => $value)
                                    <div class="form-group custom-control custom-checkbox small col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-{{$key}}"
                                               name="{{ $key }}" {{ old($key) ? 'checked' : '' }}>
                                        <label for="customCheck-{{$key}}" class="custom-control-label">{{ $value }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <label for="choices-publish-type-input" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku', strtoupper(\Str::random(9))) }}">
                            @error('sku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- end right content       -->
        </div>
    </form>
@endsection
