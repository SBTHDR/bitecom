@extends('frontend.frontend-master')

@section('content')

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>

            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 wow fadeInUp">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image"> <a
                                    href="{{ url('product/details/'.$product->id) }}"><img
                                        src="{{ asset('upload/products/' . $product->product_thumbnail) }}" alt=""></a> </div>
                            <!-- /.image -->

                            @php
                            $amount = $product->sell_price - $product->discount_price;
                            $discount = ($amount/$product->sell_price) * 100;
                            @endphp

                            <div>
                                @if ($product->discount_price == NULL)
                                <div class="tag new"><span>new</span></div>
                                @else
                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @endif
                            </div>

                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                            <h3 class="name"><a
                                    href="{{ url('product/details/'.$product->id) }}">
                                    
                                    {{ $product->product_name }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>


                            @if ($product->discount_price == NULL)
                            <div class="product-price"> <span class="price"> ${{ $product->sell_price }} </span>
                            </div>

                            @else

                            <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span>
                                <span class="price-before-discount">$ {{ $product->sell_price }}</span> </div>
                            @endif

                            <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                            title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                                class="fa fa-signal"></i> </a> </li>
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                    </div>
                    <!-- /.product -->

                </div>
                <!-- /.products -->
            </div>
            <!-- /.item -->
            @endforeach

        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /.body-content -->
@endsection
