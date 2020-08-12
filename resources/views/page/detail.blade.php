@extends('layouts.index')
@section('content')
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp"style="margin-bottom:-2px;">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>

                    <li>
                        <a href="" title="">{{$details->page_title}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right"style="margin-top:25px;background: white;">
            <div class="section" id="detail-blog-wp" style="padding: 15px;">
                <div class="section-head clearfix">
                <h3 class="section-title">{{$details->page_title}}</h3>
                </div>
                <div class="section-detail">
                    <span class="create-date">{{$details->created_at}}</span>
                    <div class="see-more">
                        <p>{!!$details->page_content!!}</p>
                    </div>
                </div>
                <div style="text-align:center">
                    <button type="button" style="margin-top:20px;" class=" btn-read btn btn-sm btn-outline-dark">CLICK <i id="arrow" class="fa fa-caret-down" aria-hidden="true"></i></button>
                </div>
                <div class="section" id="social-wp">
                    <div class="section-detail">
                        <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        <div class="g-plusone-wp">
                            <div class="g-plusone" data-size="medium"></div>
                        </div>
                        <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            
        </div>
</div>
@endsection
@section('sidebar')
<div class="sidebar fl-left"  >
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