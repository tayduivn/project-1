@extends('layouts.index')
@section('content')
<div class="secion" id="breadcrumb-wp">
    <div class="secion-detail">
        <ul class="list-item clearfix">   
            <li>
                <a href="" title="">Trang chủ</a>
            </li> 
            <li>
                <a href="" title=""> {{$cats->cat_title}}</a>              
            </li>            
            <li>
                <a href="" title="">{{$caterows->product_name}}</a>
            </li>         
        </ul>
    </div>
</div>
<div class="main-content fl-right">
    <div class="section" id="detail-product-wp">
        <div class="section-detail clearfix">
            <div class="thumb-wp fl-left">
                <a href="" title="" id="main-thumb">
                    <div style="position: relative;">
                        <img id="zoom"style="position: absolute;" src="{{asset($product_details->product_thumb)}}" data-zoom-image="{{asset($product_details->product_thumb)}}"/>
                    </div>
                </a>

                <div id="list-thumb">
                    @foreach ($product_imgs as $product_img)
                    <a href="" data-image="{{asset($product_img->product_img)}}" data-zoom-image="{{asset($product_img->product_img)}}">
                        <img style="width:65px;height:65px;" id="zoom" src="{{asset($product_img->product_img)}}"/>
                    </a>
                    @endforeach
                    
                </div>
            </div>
            <div class="thumb-respon-wp fl-left">
                <img src="{{asset($product_details->product_thumb)}}" alt="">
            </div>
            <div class="info fl-right">
                <h3 class="product-name">{{$product_details->product_name}}</h3>
                <div class="desc">
                    <p>{!!$product_details->product_content!!}</p>
                    
                </div>
                <div class="num-product">
                    <span class="title">Sản phẩm: </span>
                    <span class="status">{{$product_details->status_product}}</span>
                </div>
                <p class="price">Giá: {{number_format($product_details->price_new,0,'','.')}}đ <del style="font-size:18px; color:#666;"> {{number_format($product_details->price_old,0,'','.')}}đ</del></p>
                <p class="mb-2 mt-2">Nhập số lượng:</p>
                <form action="{{route('cart.addcartmulti',$product_details->id)}}" method="POST">
                    @csrf
                    <div id="num-order-wp">
                        <a title="" id="minus"><i class="fa fa-minus"></i></a>
                        <input type="text" name="num-order" value="1" id="num-order">
                        <a title="" id="plus"><i class="fa fa-plus"></i></a>
                    </div>
                    {{-- <a href="{{route('cart.add',$product_details->id)}}" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a> --}}
                     <button class="add-cart btn btn-primary" name="btn_add" type="submit">Thêm giỏ hàng</button> 
                </form>
            </div>
        </div>
    </div>
    <div class="section" id="post-product-wp">
        <div class="section-head">
            <h3 class="section-title">Mô tả sản phẩm</h3>
        </div>

        <div class="section-detail">

            <div class="more">{!!$product_details->product_desc!!}</div>
            <div style="text-align:center">
                <button type="button" style="margin-top:20px;" class=" view btn btn-sm btn-outline-info"> <i id="arrow" class="fa fa-caret-down" aria-hidden="true"></i></button>
            </div>
            
        </div>
        <div class="fb-like mt-3" data-href="https://www.facebook.com/C%E1%BB%ADabh%C3%A0ng-Ismart-105096221222169/?modal=admin_todo_tour" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>

        <p class=" mt-4 font-weight-bold">Xin mời ấn <span class="but" style="color:#c69a39;cursor: pointer;">vào đây </span>để bình luận về sản phẩm {!!$product_details->product_name!!} :
       
        <form class="comment_form" action="{{route('product.comment',$caterows->id)}}" method="POST" style="margin-top:15px;background:white;padding:10px;">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
            @error('email')
                <i><small class="text-danger">{{$message}}</small></i>
            @enderror
             
            <div class="form-group">
                <label for="name">Họ và Tên:</label>
                <input  class="form-control" type="text" name="name" id="name">
            </div>
            @error('name')
            <i><small class="text-danger">{{$message}}</small></i>
            @enderror
           
            <div class="form-group" >
                <label for="comment">Bình luận:</label>
                <textarea rows="10" name="comment" class="form-control" placeholder="Xin mời nhập bình luận!"></textarea>
            </div>
            @error('comment')
                <i><small class="text-danger">{{$message}}</small></i>
            @enderror
            <div style="text-align:center">
                <input type="submit" class="btn btn-primary btn-sm" value="Bình luận">
            </div>

        </form>
        
        <ul style="background: #fff;margin-top:30px;">
            @foreach ($comments as $comment)
                <li>
                    <div class="d-flex" style="background: #fff; padding-top:10px;padding-left:10px;">
                        <i style="font-size: 30px; margin-right:10px;margin-top:5px;" class="far fa-user"></i>
                        <div class="">
                                <span class="font-weight-bold">{{$comment->name}}</span>
                                <p >{{$comment->comment}}</p>
                                
                                    <span> {{$comment->created_at}}</span>
                               
                        </div>           
                    </div>
            </li>
            @endforeach     
        </ul>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail">
            <ul class="list-item ">
                {{ $comments->links()}}
            </ul>
        </div>
    </div>
    <div class="section" id="same-category-wp">
        <div class="section-head">
            <h3 class="section-title">Cùng chuyên mục</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                @foreach ($cate_products as $cate_product)
                <li>
                    <a href="{{route('product.detail',$cate_product->id)}}" title="" class="thumb">
                        <img style="width:300px ;height:180px;"  src="{{asset($cate_product->product_thumb)}}">
                    </a>
                    <a href="{{route('product.detail',$cate_product->id)}}" title="" class="product-name">{{$cate_product->product_name}}</a>
                    <div class="price">
                        <span class="new">{{number_format($cate_product->price_new,0,'','.')}}đ</span>
                        <span class="old">{{number_format($cate_product->price_old,0,'','.')}}đ</span>
                    </div>
                    <div class="action clearfix">
                        <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                        <a href="" title="" class="buy-now fl-right">Mua ngay</a>
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
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
                <img src=" {{asset('images/banner.jpg ')}}" alt="">
            </a>
        </div>
    </div>
</div>
@endsection