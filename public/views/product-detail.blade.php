@extends('layouts.app')
@section('content')
   <!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">{{ $product->name }}</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">{{ $product->category->name }}</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    @foreach($product->images as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img class="w-100 h-100" src="{{ Storage::url($image) }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    @for($i = 0; $i < 5; $i++)
                        <small class="{{ $i < $product->averageRating() ? 'fas' : 'far' }} fa-star"></small>
                    @endfor
                </div>
                <small class="pt-1">({{ $product->reviews_count }} Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">{{ $product->price_sale ? $product->price_sale : $product->price }} $</h3>
            <p class="mb-4">{{ $product->description }}</p>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    @foreach($sizes as $id => $name)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-{{ $id }}" name="product_size_id" value="{{ $id }}">
                            <label class="custom-control-label" for="size-{{ $id }}">{{ $name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    @foreach($colors as $id => $name)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-{{ $id }}" name="product_color_id" value="{{ $id }}">
                            <label class="custom-control-label" for="color-{{ $id }}">{{ $name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" name="quantity" class="form-control bg-secondary text-center" value="1" min="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus" type="button">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
            </form>

            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="https://twitter.com/intent/tweet?url={{ url()->current() }}">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews ({{ $product->reviews_count }})</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{ $product->full_description }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Additional Information</h4>
                    <p>{{ $product->additional_information }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                @foreach($product->additional_info_list1 as $info)
                                    <li class="list-group-item px-0">
                                        {{ $info }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                @foreach($product->additional_info_list2 as $info)
                                    <li class="list-group-item px-0">
                                        {{ $info }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">{{ $product->reviews_count }} review{{ $product->reviews_count > 1 ? 's' : '' }} for "{{ $product->name }}"</h4>
                            @foreach($product->reviews as $review)
                                <div class="media mb-4">
                                    <img src="{{ asset('img/user.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{ $review->user->name }}<small> - <i>{{ $review->created_at->format('d M Y') }}</i></small></h6>
                                        <div class="text-primary mb-2">
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="{{ $i < $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                            @endfor
                                        </div>
                                        <p>{{ $review->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            @auth
                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <div class="rating">
                                                @for($i = 5; $i >= 1; $i--)
                                                    <input type="radio" name="rating" value="{{ $i }}" id="rating-{{ $i }}">
                                                    <label for="rating-{{ $i }}"></label>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Your Review *</label>
                                        <textarea name="content" id="review" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            @else
                                <p>You need to be logged in to leave a review. <a href="{{ route('login') }}">Login here.</a></p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->

@endsection
