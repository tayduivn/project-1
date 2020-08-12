@extends('layouts.index')
@section('content')

<div class="secion" id="breadcrumb-wp">
    <div class="secion-detail">
        <ul class="list-item clearfix">
            <li>
                <a href="" title="">Trang chủ</a>
            </li>       
            <li>
                <a href="" title="">{{$caterows->cat_title}}</a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content fl-right">
    <div class="section" id="list-product-wp">
        <div class="section-head clearfix">
            <h3 class="section-title fl-left">{{$caterows->cat_title}}</h3>
            <div class="filter-wp fl-right">
                <p class="desc">Hiển thị {{$count[0]}} trên {{$count[1]}} sản phẩm</p>
                <div class="form-filter">
                    <form method="GET" action="">
                        <select name="select">
                            <option value="0">Sắp xếp</option>
                            <option value="sort_asc_by_name">Từ A-Z</option>
                            <option value="sort_desc_by_name">Từ Z-A</option>
                            <option value="sort_desc_by_price">Giá cao xuống thấp</option>
                            <option value="sort_asc_by_price">Giá thấp lên cao</option>
                        </select>
                        <button type="submit" name="btn-rank">Lọc</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-detail">
            @if (count($products)>0)
            <ul class="list-item clearfix">
               
                @foreach ($products as $product)
                <li>
                    <a href="{{route('product.detail',$product->id)}}" title="" class="thumb">
                        
                    <img style="width:300px ;height:180px;"  src="{{asset($product->product_thumb)}}">
                    </a>
                    <a href="{{route('product.detail',$product->id)}}" title="" class="product-name">{{$product->product_name}}</a>
                    <div class="price">
                        <span class="new">{{number_format($product->price_new,0,'','.')}}đ</span>
                        <span class="old">{{number_format($product->price_old,0,'','.')}}đ</span>
                    </div>
                    <div class="action clearfix" style="text-align:center;">
                        
                        <a href="{{route('cart.add',$product->id)}}" title="Thêm giỏ hàng" class="add-cart cart-resize" style="margin: 0px 35px;border-radius:5px;">Thêm giỏ hàng</a>
                       
                        
                        {{-- <a href="{{route('cart.addcheckout',$product->id)}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a> --}}
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
    <div class="section" id="paging-wp">
        <div class="section-detail">
            <ul class="list-item ">
                {{ $products->links()}}
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
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form method="GET" action="">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Giá</td>
                        </tr>
                    </thead>
                    <tbody>
 
                        <tr>
                            <td><input type="radio" name="r_price" value="500000"></td>
                            <td>Dưới 500.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_price" value="500000-1000000"></td>
                            <td>500.000đ - 1.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_price" value="1000000-5000000"></td>
                            <td>1.000.000đ - 5.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_price" value="5000000-10000000"></td>
                            <td>5.000.000đ - 10.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_price" value="10000000"></td>
                            <td>Trên 10.000.000đ</td>
                        </tr>
                    </tbody>
                    
                </table>
                <input class="btn btn-outline-secondary btn-sm" name="btn-filter" id="btn-filter" type="submit" value="Lọc giá">
            </form>
            <form method="GET" action="">
                <table class="mt-3">
                    <thead>
                        <tr>
                            <td colspan="2">Hãng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r_brand" value="dell"></td>
                            <td>Dell</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_brand"value="apple"></td>
                            <td>Apple</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_brand"value="hp"></td>
                            <td>Hp</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_brand"value="lenovo"></td>
                            <td>Lenovo</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_brand"value="samsung"></td>
                            <td>Samsung</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_brand"value="realme"></td>
                            <td>Realme</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r_brand"value="oppo"></td>
                            <td>Oppo</td>
                        </tr>
                    </tbody>
                </table>
                <input class="btn btn-outline-secondary btn-sm" name="btn-filter" id="btn-filter" type="submit" value="Lọc hãng">
            </form>
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