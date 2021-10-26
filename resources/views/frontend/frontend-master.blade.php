<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Qulecom ecommerce | online shop</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- FAVICON -->
    <link href="{{ asset('frontend/assets/images/favicon.png') }}" rel="shortcut icon" />

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.partials.header')

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
            {{-- @include('frontend.partials.brand') --}}
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.partials.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    <!-- Cart Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title inline" id="exampleModalLabel"><span id="productName"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="" class="card-img-top" alt="" width="200" id="productImage">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: BDT <strong class="text-danger"><span id="productPrice"></span></strong> <del id="oldprice"></del></li>
                                
                                <li class="list-group-item">Code: <strong><span id="productCode"></span></strong></li>
                                <li class="list-group-item">Category: <strong><span id="productCategory"></span></strong></li>
                                <li class="list-group-item">Brand: <strong><span id="productBrand"></span></strong></li>
                                <li class="list-group-item">Stock: <span id="available" class="text-success"></span><span id="stockout" class="text-danger"></span></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Color</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="color"></select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Quantity</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="1" min="1">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="button" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/cart/' + id,
                dataType: 'json',
                success: function (data) {
                    $('#productName').text(data.product.product_name);
                    $('#productPrice').text(data.product.sell_price);
                    $('#productCode').text(data.product.product_code);
                    $('#productCategory').text(data.product.category.category_name_en);
                    $('#productBrand').text(data.product.brand.brand_name_en);
                    $('#productImage').attr('src','/upload/products/'+data.product.product_thumbnail);

                    if (data.product.discount_price == null) {
                        $('#productPrice').text('');
                        $('#oldprice').text('');
                        $('#productPrice').text(data.product.sell_price);
                    }else{
                        $('#productPrice').text(data.product.discount_price);
                        $('#oldprice').text('( Old Price: ' + data.product.sell_price + ' )');
                    }

                    if (data.product.product_quantity > 0) {
                        $('#available').text('');
                        $('#stockout').text('');
                        $('#available').text('Available');
                    }else{
                        $('#available').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Out of stock');
                    }

                    $('select[name="color"]').empty();        
                    $.each(data.color,function(key,value){
                        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
                    })
                }
            })
        }

    </script>

</body>

</html>
