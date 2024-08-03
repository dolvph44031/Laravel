@extends('layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <form action="{{ route('product.list') }}" method="GET">
                <!-- Price Filter Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <div class="d-flex">
                        <input type="number" class="form-control" name="price_min" placeholder="Min" value="{{ request('price_min') }}">
                        <input type="number" class="form-control ml-2" name="price_max" placeholder="Max" value="{{ request('price_max') }}">
                    </div>
                </div>
                <!-- Price Filter End -->

                <!-- Color Filter Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    @foreach($colors as $color_id => $color_name)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-{{ $color_id }}" name="colors[]" value="{{ $color_id }}" {{ in_array($color_id, (array)request('colors')) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="color-{{ $color_id }}">{{ $color_name }}</label>
                    </div>
                    @endforeach
                </div>
                <!-- Color Filter End -->

                <!-- Size Filter Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    @foreach($sizes as $size_id => $size_name)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-{{ $size_id }}" name="sizes[]" value="{{ $size_id }}" {{ in_array($size_id, (array)request('sizes')) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="size-{{ $size_id }}">{{ $size_name }}</label>
                    </div>
                    @endforeach
                </div>
                <!-- Size Filter End -->

                <button type="submit" class="btn btn-primary btn-block mb-4">Apply Filters</button>
            </form>
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{ route('product.search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name" name="query">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ route('product.sort', ['sort' => 'latest']) }}">Latest</a>
                                <a class="dropdown-item" href="{{ route('product.sort', ['sort' => 'popularity']) }}">Popularity</a>
                                <a class="dropdown-item" href="{{ route('product.sort', ['sort' => 'rating']) }}">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loop through the products -->
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="" width="100%" height="400px" src="{{ Storage::url($product->img_thumb) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($product->price_sale, 0, ',', '.') }} VND</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($product->price_original, 0, ',', '.') }} VND</del></h6>
                            </div>
                            <!-- Display variants -->
                            {{-- @if($product->variants->isNotEmpty())
                            <div class="mt-2">
                                <strong>Variants:</strong>
                                <ul class="list-unstyled">
                                    @foreach($product->variants as $variant)
                                    <li>{{ $variant->size->name }} - {{ $variant->color->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif --}}
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('product.detail', $product->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Pagination (if needed) -->
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            {{ $products->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@endsection
