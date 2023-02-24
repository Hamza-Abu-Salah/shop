@extends('website.include.master')

@section('title', 'Shop')

@section('content')
    <section class="page-header">
        @foreach ($category as $info)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">{{ $info->name }}</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.html">home</a></li>
                            <li class="active">{{ $info->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>


    <section class="products section">
        <div class="container">
            <div class="row">

                @if (@isset($category) && !@empty($category))

                    @foreach ($product as $info)

                        <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                        <input type="hidden" id="ajax_search_show" value="{{ route('site.show') }}">
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    @if ($info->sale_price)
                                        <span class="bage">Sale</span>
                                    @endif
                                    <img class="img-responsive" src="{{ asset('uploads/' . $info->image1) }}"
                                        alt="product-img" />
                                    <div class="preview-meta">
                                        <ul>
                                            <li>
                                                <span data-id="{{ $info->id }}" class="show_more_details">
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
                                    <h4><a href="product-single.html">{{ $info->title }}</a></h4>
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
                @else
                    <div class="alert alert-danger">
                        عفوا لاتوجد بيانات لعرضها !!
                    </div>
                @endif


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
                </div>
                <!-- /.modal -->

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('adminassets/js/carts.js') }}"></script>
@endsection
