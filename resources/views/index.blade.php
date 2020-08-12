@extends('layouts.index')
@section('content')
<div class="main-content fl-right">
    <div class="section" id="slider-wp">
        <div class="section-detail">
            @foreach ($list_sliders as $list_slider)
            <div class="item">
                <img src="{{asset($list_slider->product_thumb)}}" alt="">
            </div>
            @endforeach
            
           
        </div>
    </div>
    <div class="section" id="support-wp">
        <div class="section-detail">
            <ul class="list-item clearfix">
                <li>
                    <div class="thumb">
                        <img src="public/images/icon-1.png">
                    </div>
                    <h3 class="title">Miễn phí vận chuyển</h3>
                    <p class="desc">Tới tận tay khách hàng</p>
                </li>
                <li>
                    <div class="thumb">
                        <img src="public/images/icon-2.png">
                    </div>
                    <h3 class="title">Tư vấn 24/7</h3>
                    <p class="desc">1900.9999</p>
                </li>
                <li>
                    <div class="thumb">
                        <img src="public/images/icon-3.png">
                    </div>
                    <h3 class="title">Tiết kiệm hơn</h3>
                    <p class="desc">Với nhiều ưu đãi cực lớn</p>
                </li>
                <li>
                    <div class="thumb">
                        <img src="public/images/icon-4.png">
                    </div>
                    <h3 class="title">Thanh toán nhanh</h3>
                    <p class="desc">Hỗ trợ nhiều hình thức</p>
                </li>
                <li>
                    <div class="thumb">
                        <img src="public/images/icon-5.png">
                    </div>
                    <h3 class="title">Đặt hàng online</h3>
                    <p class="desc">Thao tác đơn giản</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="section" id="feature-product-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm mới nhất</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                @foreach ($list_populars as $list_popular)
                <li>
                    <a href="{{route('product.detail',$list_popular->id)}}" title="" class="thumb">
                    <img style="width:300px ;height:180px;" src="{{asset($list_popular->product_thumb)}}">
                    </a>
                    <a href="{{route('product.detail',$list_popular->id)}}" title="" class="product-name">{{$list_popular->product_name}}</a>
                    <div class="price">
                        <span class="new">{{number_format($list_popular->price_new,'0','','.')}}đ</span>
                        <span class="old">{{number_format($list_popular->price_old,'0','','.')}}đ</span>
                    </div>
                    <div class="action clearfix">
                        <a href="{{route('cart.add',$list_popular->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                        <a href="{{route('cart.addcheckout',$list_popular->id)}}" title="" class="buy-now fl-right">Mua ngay</a>
                    </div>
                </li>
                @endforeach           
            </ul>
        </div>
    </div>
    <div class="section" id="list-product-wp">
        <div class="section-head">
            <h3 class="section-title">Điện thoại</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item clearfix">
                @foreach ($list_mobiles as $list_mobile)
                <li>
                    <a href="{{route('product.detail',$list_mobile->id)}}" title="" class="thumb">
                        <img style="width:300px ;height:180px;" src="{{asset($list_mobile->product_thumb)}}">
                    </a>
                    <a href="{{route('product.detail',$list_mobile->id)}}" title="" class="product-name">{{$list_mobile->product_name}}</a>
                    <div class="price">
                        <span class="new">{{number_format($list_mobile->price_new,0,'','.')}}đ</span>
                        <span class="old">{{number_format($list_mobile->price_old,0,'','.')}}đ</span>
                    </div>
                    <div class="action clearfix">
                        <a href="{{route('cart.add',$list_mobile->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                        <a href="{{route('cart.addcheckout',$list_mobile->id)}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                    </div>
                </li>
                @endforeach
                
            </ul>
            
        </div>
       
       
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail">
            <ul class="list-item ">
                {{$list_mobiles->links()}}
            </ul>
        </div>
    </div>
    <div class="section" id="list-product-wp">
        <div class="section-head">
            <h3 class="section-title">Laptop</h3>
        </div>
        <div class="section-detail">
            
            <ul class="list-item clearfix">
                @foreach ($list_laptops as $list_laptop)
                <li>
                    <a href="{{route('product.detail',$list_laptop->id)}}" title="" class="thumb">
                        <img style="width:300px ;height:180px;" src="{{asset($list_laptop->product_thumb)}}">
                    </a>
                    <a href="{{route('product.detail',$list_laptop->id)}}" title="" class="product-name">{{$list_laptop->product_name}}</a>
                    <div class="price">
                        <span class="new">{{number_format($list_laptop->price_new,0,'','.')}}đ</span>
                        <span class="old">{{number_format($list_laptop->price_lod,0,'','.')}}đ</span>
                    </div>
                    <div class="action clearfix">
                        <a href="{{route('cart.add',$list_laptop->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                        <a href="{{route('cart.addcheckout',$list_laptop->id)}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail">
            <ul class="list-item ">
                {{$list_mobiles->links()}}
            </ul>
        </div>
    </div>
    <div class="section" id="list-product-wp">
        <div class="section-head">
            <h3 class="section-title">Đồng hồ thông minh</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item clearfix">
                @foreach ($list_watchs as $list_watch)
                <li>
                    <a href="{{route('product.detail',$list_watch->id)}}" title="" class="thumb">
                        <img style="width:300px ;height:180px;" src="{{asset($list_watch->product_thumb)}}">
                    </a>
                    <a href="{{route('product.detail',$list_watch->id)}}" title="" class="product-name">{{$list_watch->product_name}}</a>
                    <div class="price">
                        <span class="new">{{number_format($list_watch->price_new,0,'','.')}}đ</span>
                        <span class="old">{{number_format($list_watch->price_lod,0,'','.')}}đ</span>
                    </div>
                    <div class="action clearfix">
                        <a href="{{route('cart.add',$list_watch->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                        <a href="{{route('cart.addcheckout',$list_watch->id)}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                    </div>
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                @foreach ($categories as $category)
                <li>
                <a href="{{route('product.show',$category->id)}}" title="">{{$category->cat_title}}</a>
                
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                @foreach ($list_bestsellings as $list_bestselling)
                  <li class="clearfix">
                    <a href="{{route('product.detail',$list_bestselling->id)}}" title="" class="thumb fl-left">
                    <img src="{{asset($list_bestselling->product_thumb)}}" alt="">
                    </a>
                    <div class="info fl-right">
                    <a href="{{route('product.detail',$list_bestselling->id)}}" title="" class="product-name">{{$list_bestselling->product_name}}</a>
                        <div class="price">
                            <span class="new">{{number_format($list_bestselling->price_new,0,'','.')}}đ</span>
                            <span class="old">{{number_format($list_bestselling->price_old,0,'','.')}}đ</span>
                        </div>
                        <a href="{{route('cart.addcheckout',$list_bestselling->id)}}" title="" class="buy-now">Mua ngay</a>
                    </div>
                   </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
            <img src="{{asset('images/banner.jpg')}}" alt="">
            </a>
        </div>
    </div>
</div>
@endsection


