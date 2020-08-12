@extends('layouts.index')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <p style="color:black; margin-bottom:10px;float:right;">Hiện tại có ({{Cart::count()}}) sản phẩm trong giỏ hàng</p>
    <div id="wrapper" class="wp-inner clearfix">
        
            <form action="{{route('cart.update')}}" method="POST">
                @csrf
                @if (count(Cart::content())>0)
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t=0;
                                @endphp
                                @foreach (Cart::content() as $row)
                                @php
                                    $t++;
                                @endphp
                                <tr>
                                    <td>{{$t}}</td>
                                    <td>{{$row->options->product_code}}</td>
                                    <td>
                                        <a href="{{route('product.detail',$row->id)}}" title="" class="thumb">
                                            <img src="{{asset($row->options->product_thumb)}}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.detail',$row->id)}}" title="" class="name-product">{{$row->name}}</a>
                                    </td>
                                    <td>{{number_format($row->price,0,'','.')}}đ</td>
                                    <td>
                                    <input min="0"  data-id="{{$row->id}}"   type="number" name="qty[{{$row->rowId}}]" value="{{$row->qty}}" class="num-order">
                                    </td>
                                    <td id="{{$row->id}}">{{number_format($row->total,0,'','.')}}đ</td>
                                    <td>
                                        <a href="{{route('cart.remove',$row->rowId)}}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span>{{Cart::total()}}đ</span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                {{-- <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a> --}}
                                                <input type="submit" style="display: inline-block;
                                                padding: 12px 25px;
                                                text-transform: uppercase;
                                                font-size: 13px;
                                                border-radius: 3px;
                                                font-family: 'Roboto Bold';
                                                font-weight: normal;
                                                border: none;
                                                outline: none;
                                                background: #3f5da6;
                                                color: #fff;"   value="Cập nhật giỏ hàng" name="btn_update">

                                                <a href="{{url('cart/checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                        <a href="{{url('index')}}" title="" id="buy-more">Mua tiếp</a><br />
                        <a href="{{route('cart.destroy')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div> 
            </form>
            @else
                <div style="margin-left: 40%;" class="text_empty">
                    <img style="width: 35%;" src="{{asset('images/empty-cart.png')}}" alt="">
                    <a href="{{url('index')}}" style=" background: #F12A43; color: white; display: inline-block;  padding: 3px 15px;   border-radius: 4px;   margin-left: 8%;">Tiếp tục mua sắm</a>
                </div>
            @endif
        
    </div>
</div>
@endsection