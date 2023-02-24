@extends('website.include.master')

@section('title', 'Home')

@section('content')


    <div class="hero-slider">
        @foreach ($slider_product as $product)
            <div class="slider-item th-fullpage hero-area"
                style="background-image: url({{ asset('uploads/' . $product->image1) }})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 text-center">
                            <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">{{ $product->title }}</p>
                            <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{ $product->content }}
                                <br> {{ $product->content }}
                            </h1>
                            <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                                href="{{ route('site.shop') }}">{{ $product->text_btn }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <section class="product-category section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Product Category</h2>
                    </div>
                </div>
                @foreach ($last_categories as $categories)
                    <div class="col-md-6">
                        <div class="category-box category-box-2">
                            <a href="{{ route('site.category',$categories->id) }}">
                                <img src="{{ asset('uploads/' . $categories->image) }}" alt="" />
                                <div class="content">
                                    <h3>{{ $categories->name }}</h3>
                                    <p>{{ $categories->content }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Trendy Products</h2>
                </div>
            </div>
            <div class="row">

                @foreach ($last_product as $info)
                <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                <input type="hidden" id="ajax_search_show" value="{{ route('site.show') }}">
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">
                                    @if ($info->sale_price)
                                        Sale
                                    @endif
                                </span>
                                <img class="img-responsive" src="{{ asset('uploads/' . $info->image1) }}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-id = "{{ $info->id }}" class="show_more_details">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="{{ route('site.single_product',$info->id) }}">{{ $info->title }}</a></h4>
                                <p class="price">
                                    @if ($info->sale_price)
                                        <del>${{ $info->price }}</del> ${{ $info->sale_price }}
                                    @else
                                        ${{ $info->price }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                <div class="modal product-modal fade" id="MoreDetailsModal">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tf-ion-close"></i>
                    </button>
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-body" id="MoreDetailsModalBody">

                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->

            </div>
        </div>
    </section>


    <!--
            Start Call To Action
            ==================================== -->
    <section class="call-to-action bg-gray section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>SUBSCRIBE TO NEWSLETTER</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut
                            sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                    </div>
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="input-group subscription-form">
                            <input type="text" class="form-control" placeholder="Enter Your Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-main" type="button">Subscribe Now!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <section class="section instagram-feed">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>View us on instagram</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="instagram-slider" id="instafeed"
                        data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')

<script src="{{ asset('adminassets/js/carts.js') }}"></script>

@stop
