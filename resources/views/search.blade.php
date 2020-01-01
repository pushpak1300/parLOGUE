<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src=""></script>
 <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!------ Include the above in your HEAD tag ---------->
</head>
<style>
    /********************* Shopping Demo-2 **********************/
    .demo {
        padding: 45px 0
    }

    .product-grid2 {
        font-family: 'Open Sans', sans-serif;
        position: relative
    }

    .product-grid2 .product-image2 {
        overflow: hidden;
        position: relative
    }

    .product-grid2 .product-image2 a {
        display: block
    }

    .product-grid2 .product-image2 img {
        width: 100%;
        height: auto
    }

    /* .product-image2 .pic-1{opacity:1;transition:all .5s} */
    /* .product-grid2:hover .product-image2 .pic-1{opacity:0} */
    .product-image2 .pic-2 {
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        transition: all .5s
    }

    .product-grid2:hover .product-image2 .pic-2 {
        opacity: 1
    }

    .product-grid2 .social {
        padding: 0;
        margin: 0;
        position: absolute;
        bottom: 50px;
        right: 25px;
        z-index: 1
    }

    .product-grid2 .social li {
        margin: 0 0 10px;
        display: block;
        transform: translateX(100px);
        transition: all .5s
    }

    .product-grid2:hover .social li {
        transform: translateX(0)
    }

    .product-grid2:hover .social li:nth-child(2) {
        transition-delay: .15s
    }

    .product-grid2:hover .social li:nth-child(3) {
        transition-delay: .25s
    }

    .product-grid2 .social li a {
        color: #505050;
        background-color: #fff;
        font-size: 17px;
        line-height: 45px;
        text-align: center;
        height: 45px;
        width: 45px;
        border-radius: 50%;
        display: block;
        transition: all .3s ease 0s
    }

    .product-grid2 .social li a:hover {
        color: #fff;
        background-color: #3498db;
        box-shadow: 0 0 10px rgba(0, 0, 0, .5)
    }

    .product-grid2 .social li a:after,
    .product-grid2 .social li a:before {
        content: attr(data-tip);
        color: #fff;
        background-color: #000;
        font-size: 12px;
        line-height: 22px;
        border-radius: 3px;
        padding: 0 5px;
        white-space: nowrap;
        opacity: 0;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
        top: -30px
    }

    .product-grid2 .social li a:after {
        content: '';
        height: 15px;
        width: 15px;
        border-radius: 0;
        transform: translateX(-50%) rotate(45deg);
        top: -22px;
        z-index: -1
    }

    .product-grid2 .social li a:hover:after,
    .product-grid2 .social li a:hover:before {
        opacity: 1
    }

    .product-grid2 .add-to-cart {
        color: #fff;
        background-color: #404040;
        font-size: 15px;
        text-align: center;
        width: 100%;
        padding: 10px 0;
        display: block;
        position: absolute;
        left: 0;
        bottom: -100%;
        transition: all .3s
    }

    .product-grid2 .add-to-cart:hover {
        background-color: #3498db;
        text-decoration: none
    }

    .product-grid2:hover .add-to-cart {
        bottom: 0
    }

    .product-grid2 .product-new-label {
        background-color: #3498db;
        color: #fff;
        font-size: 17px;
        padding: 5px 10px;
        position: absolute;
        right: 0;
        top: 0;
        transition: all .3s
    }

    .product-grid2:hover .product-new-label {
        opacity: 0
    }

    .product-grid2 .product-content {
        padding: 20px 10px;
        text-align: center
    }

    .product-grid2 .title {
        font-size: 17px;
        margin: 0 0 7px
    }

    .product-grid2 .title a {
        color: #303030
    }

    .product-grid2 .title a:hover {
        color: #3498db
    }

    .product-grid2 .price {
        color: #303030;
        font-size: 15px
    }

    @media screen and (max-width:990px) {
        .product-grid2 {
            margin-bottom: 30px
        }
    }

</style>

<body>
    <div class="container">
        <h2 class="h3 text-center py-4">ParLogue </h2>
        <h6 class="text-center"> <a href="/home">Home</a> </h6>
        <p class="text-center pb-4">{{$product->count()}} Products Find</p>
        <div class="row">
            @if ($product->count()>0)
            @foreach ($product as $item)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2">
                        <a href="{{asset($item->photho_path)}}" data-toggle="lightbox" data-gallery="example-gallery" data-type="image">
                            <img class="pic-1 img-fluid" height="330px" width="210px" src="{{asset($item->photho_path)}}" >
                        </a>

                        <a class="add-to-cart" href="#{{$item->id}}""
                            data-target="#{{$item->id}}">View Image</a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$item->company}}</a></h3>
                        <h3 class="title"><a href="#">{{$item->design_no}}</a></h3>
                        <span class="price">{{$item->price}}/-</span>
                    </div>
                </div>

            </div>
            
            @endforeach
            @else
            <h1 class="text-center py-4">No products to show</h1>
            @endif

        </div>
    </div>
    <hr>
</body>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                alwaysShowClose: false,
                wrapping: false ,
                onShown: function() {
                    console.log('Checking our the events huh?');
                }
                });
            });
</script>
</html>
