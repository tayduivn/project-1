@extends('layouts.index')
@section('content')


<div class="secion" id="breadcrumb-wp"style="margin-bottom:-2px;">
    <div class="secion-detail">
        <ul class="list-item clearfix">
            <li>
                <a href="" title="">Trang chủ</a>
            </li>
            <li>
                <a href="" title="">Page</a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content fl-right">
    <div class="section" id="list-blog-wp"style="margin-top:25px;">
        <div class="section-head clearfix">
            <p style="font-size:25px;font-weight:500;margin-bottom:20px;">Page</p>
        </div>
        <div class="section-detail">
           
            <ul class="list-item">
                @foreach ($pages as $page)
                    <li class="clearfix">
                        <a href="{{route('page.detail',$page->id)}}" title="" class="thumb fl-left">
                            <img src="{{asset($page->page_img)}}" alt="">
                        </a>
                        <div class="info fl-right">
                        <a href="{{route('page.detail',$page->id)}}" title="" class="title">{{$page->page_title}}</a>
                            <span class="create-date">{{$page->created_at}}</span>
                            <p class="desc">{!!$page->page_desc!!}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            
        </div>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail">
            <ul class="list-item clearfix">
                {{$pages->links()}}
            </ul>
        </div>
    </div>

</div>
@endsection
@section('sidebar')
<div class="sidebar fl-left">
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