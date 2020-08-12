<!DOCTYPE html>
<html>

<head>
    <title>UNIMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="{{asset('css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('reset.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('responsive.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/customs.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body class="preloading">
    <div class="loader">
        <span style="font-size:70px;" class="fa fa-spinner fa-pulse fa-3x fa-fw xoay icon"></span>
    </div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="{{url('product/manual')}}" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{url('index')}}" title="">Trang chủ</a>
                                </li>
                               
                                <li>
                                    <a href="{{url('page/show')}}" title="">Tin tức</a>
                                </li>
                                <li>
                                    <a href="?page=detail_blog" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="?page=detail_blog" title="">Liên hệ</a>
                                </li>
                                <li>
                                    <a href="{{url('account/login')}}" title="">Đăng nhập</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                    <a href="{{url('index')}}" title="" id="logo" class="fl-left"><img style="width:200px;" src="{{asset('images/logo1.png')}}" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="{{url('product/search')}}" style="position: absolute;">
                                   @csrf
                                <input type="text" name="keyword" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!"style="border-radius:50px;font-weight:italic;">
                                <button type="submit" id="sm-s" style="position: absolute;top:3px;left:368px;border-radius:90px;font-size:18px;"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a style="position: relative;" href="{{url('cart/show')}}" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                @if (Cart::count()>0)
                                    <span id="num"style="font-size:16px;position: absolute;top:6px;">{{Cart::count()}}</span>
                                @else
                                    <span id="num"style="font-size:16px;position: absolute;top:6px;"> </span>
                                @endif
                               
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart"style="position: relative;">
                                    <a href="{{url('cart/show')}}">
                                        <i class="fa fa-shopping-cart" style="color:white;" aria-hidden="true"></i>
                                    </a>
                                    @if (Cart::count()>0)
                                         <span id="num"style="font-size:16px;position: absolute;top:-14px;">{{Cart::count()}}</span>
                                    @else
                                         <span id="num"style="font-size:16px;position: absolute;top:-14px;"> </span>
                                    @endif
                                </div>
                                <div id="dropdown">
                                   @if (Cart::count()>0)
                                   <p class="desc">Có <span>{{Cart::count()}} sản phẩm</span> trong giỏ hàng</p>
                                   <ul class="list-cart" style=" height: 250px; overflow-y: scroll;">
                                       @foreach (Cart::content() as $row)
                                           <li class="clearfix">
                                               <a href="{{route('product.detail',$row->id)}}" title="" class="thumb fl-left">
                                                   <img src="{{asset($row->options->product_thumb)}}" alt="">
                                               </a>
                                               <div class="info fl-right">
                                                   <a href="" title="" class="product-name">{{$row->name}}</a>
                                                   <p class="price">{{number_format($row->price,0,'','.')}}đ</p>
                                                   <p class="qty">Số lượng: <span>{{$row->qty}}</span></p>
                                               </div>
                                           </li>
                                       @endforeach
                                      
                                   </ul>
                                   <div class="total-price clearfix">
                                       <p class="title fl-left">Tổng:</p>
                                       <p class="price fl-right">{{Cart::total()}}đ</p>
                                   </div>
                                   <div class="action-cart clearfix">
                                       <a href="{{url('cart/show')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                       <a href="{{url('cart/checkout')}}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                   </div>
                                   @else
                                   <div class="text_empty">
                                          <img src="{{asset('images/empty-cart.png')}}" alt="">
                                   </div>
                                   @endif
                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  content  --}}
            <div id="main-content-wp" class="home-page clearfix">
                <div class="wp-inner">
                   @yield('content')
                   @yield('sidebar')
                   @yield('manual')
                </div>
              
            </div>
            {{--  footer  --}}
            <div id="footer-wp">
                <div id="foot-body">
                    <div class="wp-inner clearfix">
                        <div class="block" id="info-company">
                            <h3 class="title"style="color:#c39328;">UNIMART</h3>
                            <p class="desc">UNISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                            <div id="payment">
                                <div class="thumb">
                                    <img src="{{asset('images/img-foot.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Thông tin cửa hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>106 - Trần Bình - Cầu Giấy - Hà Nội</p>
                                </li>
                                <li>
                                    <p>0987.654.321 - 0989.989.989</p>
                                </li>
                                <li>
                                    <p>vshop@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block menu-ft policy" id="info-shop">
                            <h3 class="title">Chính sách mua hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <a href="" title="">Quy định - chính sách</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách hội viện</a>
                                </li>
                                <li>
                                    <a href="" title="">Giao hàng - lắp đặt</a>
                                </li>
                            </ul>
                        </div>
                        <div class="block" id="newfeed">
                            <h3 class="title">Bảng tin</h3>
                            <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                            <div id="form-reg">
                                <form method="POST" action="">
                                    <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                                    <button type="submit" id="sm-reg">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="foot-bot">
                    <div class="wp-inner">
                        <p id="copyright">© Lê Quang Trung - Trường Đại Học Công Nghiệp Nà Nội</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-respon">
            <a href="{{url('index')}}" title="" class="logo">UNIMART</a>
            <div id="menu-respon-wp">
                <ul class="" id="main-menu-respon">
                    <li>
                    <a href="{{url('index')}}" title>Trang chủ</a>
                    </li>
                    @foreach ( session('categories') as $value)
                    <li>
                        <a href="{{route('product.show',$value['id'])}}" title>{{$value['cat_title']}}</a>                      
                    </li>
                    @endforeach
                   
                    <li>
                        <a href="{{url('page/show')}}" title>Blog</a>
                    </li>
                    <li>
                        <a href="" title>Giới thiệu</a>
                    </li>
                    <li>
                        <a href="" title>Liên hệ</a>
                    </li>
                </ul>
                <form method="POST" action="{{url('product/search')}}">
                    @csrf
                 <input type="text" name="keyword" id="s" placeholder="Tìm kiếm tại đây!">
                 <button type="submit" id="sm-s">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div id="btn-top"><img src="{{asset('images/icon-to-top.png')}}" alt="" /></div>
        <div id="fb-root"></div>
        <!-- AutoAds Tracking Code --><script id='autoAdsMaxLead-widget-script' src='https://cdn.autoads.asia/scripts/autoads-maxlead-widget.js?business_id=EC30204BE51446509FBCC8F5F8C03D3B' type='text/javascript' charset='UTF-8' async></script> <!-- End -->
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
</body>

</html>