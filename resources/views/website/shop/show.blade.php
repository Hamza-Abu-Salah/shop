@if (@isset($data) && !@empty($data))
    <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="modal-image">
                <img class="img-responsive" src="{{ asset('uploads/' . $data['image1']) }}" alt="product-img" />
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="product-short-details">
                <h2 class="product-title">{{ $data['name'] }}</h2>
                <p class="product-price">
                    @if ($data['sale_price'])
                        <del>{{ $data['price'] }} </del> ${{ $data['sale_price'] }}
                    @endif
                </p>
                <p class="product-short-description">
                    {{ $data['content'] }}
                </p>
                <a href="cart.html" class="btn btn-main">Add To Cart</a>
                <a href="product-single.html" class="btn btn-transparent">View Product
                    Details</a>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger">
        عفوا لاتوجد بيانات لعرضها !!
    </div>
@endif
