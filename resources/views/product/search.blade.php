@extends('layouts.index')
@section('content')
<div class="secion" id="breadcrumb-wp">
    <div class="secion-detail">
        <ul class="list-item clearfix">
            <li>
                <a href="" title="">Trang chủ</a>
            </li>
            <li>
                <a href="" title="">Tìm kiếm</a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content fl-right">
    <div class="section" id="list-product-wp">
        <div class="section-head clearfix">

            <p style="font-weight:580;font-size:22px; margin-bottom:30px">Tìm thấy {{count( $products)}} sản phẩm cho từ khóa "{{$keyword}}" </p>
        </div>
        
        <div class="section-detail">
            @if(count($products)>0)
            <ul class="list-item clearfix">
                @foreach ($products as $product)
                    <li>
                        <a href="{{route('product.detail',$product->id)}}" title="" class="thumb">
                            <img style="width:300px ;height:160px;" src="{{asset($product->product_thumb)}}">
                        </a>
                        <a href="{{route('product.detail',$product->id)}}" title="" class="product-name">{{$product->product_name}}</a>
                        <div class="price">
                            <span class="new">{{number_format($product->price_new,0,'','.')}}đ</span>
                            <span class="old">{{number_format($product->price_old,0,'','.')}}đ</span>
                        </div>
                        <div class="action clearfix">
                            <a href="{{route('cart.add',$product->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                            <a href="{{route('cart.addcheckout',$product->id)}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                        </div>
                    </li>  
                @endforeach
            </ul>
           @else
           <div style="text-align:center;" class="text_empty">
                <img style="display: inline-block;margin-bottom:15px;margin-top:40px;" src="{{asset('images/noti-search.png')}}" alt="">
                <p>Chúng tôi không tìm thấy sản phẩm nào.Xin vui lòng nhấn vào đây để quay về <a href="{{url('index')}}">Trang chủ!</a></p>
           </div>
           @endif  
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