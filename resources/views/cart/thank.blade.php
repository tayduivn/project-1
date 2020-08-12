@extends('layouts.index')
@section('content')
<div id="main-content-wp" class="thank-page">
    <div class="wp-inner clearfix ">
        <div id="wrapper"  style="width:100%" class="wp-inners wp-checkout-success clearfix">
            @if (session('status'))
            <div class="alert alert-success">
               {{session('status')}}
            </div>
            @endif
            <div id="info-top">
                <div class="icon-img"><img src="{{asset('images/check-mark-64.png')}}" alt=""></div>
                <h1 class="thanks">Cảm ơn quý khách {{$list_fullname->fullname}} đã mua hàng tại Ismart</h1>
                <p class="sent-email">Chúng tôi đã gửi thông tin đơn hàng vào email của quý khách, vui lòng kiểm tra email của quý khách</p>

                <p class="order-id">Đơn hàng: {{$info_orders->order_code}} - {{$info_order}} </p>

                <p class="order-date"> {{$datetime}}</p>
            </div>

            <div class="info-order clearfix">
                <div class="info-left fl-left clearfix">
                    <div class="widget ship-address fl-left">
                        <div class="wp-wd-head">
                            <div class="widget-head">
                                <i class="fa fa-home fl-left" aria-hidden="true"></i>
                                <p class="fl-left">Địa chỉ nhận hàng</p>
                            </div>
                        </div>
                        <div class="widget-content">
                            <p> {{$info_orders->address}} </p>
                        </div>
                    </div>
                    <div class="widget payment-method fl-right">
                        <div class="wp-wd-head">
                            <div class="widget-head">
                                <i class="fa fa-money fl-left" aria-hidden="true"></i>
                                <p class="fl-left">Phương thức thanh toán</p>
                            </div>
                        </div>
                        <div class="widget-content">
                            <span class="detail"> {{$info_orders->ship_info}}</span> </div>
                    </div>
                </div>
                <div class="widget info-right fl-right">
                    <div class="wp-wd-head">
                        <div class="widget-head">
                            <i class="fa fa-info-circle fl-left" aria-hidden="true"></i>
                            <p class="fl-left">Chi tiết đơn hàng</p>
                        </div>
                    </div>

                    <div class="widget-content" style="overflow-y:scroll;max-height:400px">
                      
                                <ul class="list_detail">
                                    {{-- @foreach ($info_products as $info_product)
                                        <li class="clearfix mb-5">
                                            <div class="img-product mr-3"><img src="{{asset($info_product->thumb_product)}}" alt=""></div>
                                            <div class="content-product">
                                                <p class="product-name">{{$info_product->product_name}}</p>
                                                <p class="qty">Số lượng: {{$info_product->qty}} <span></span></p>
                                            </div>
                                        </li>
                                    @endforeach --}}
                                    

                                    @foreach (Cart::content() as $row)
                                        <li class="clearfix mb-5">
                                            <div class="img-product mr-3"><img src="{{asset($row->options->product_thumb)}}" alt=""></div>
                                            <div class="content-product">
                                                <p class="product-name">{{$row->name}}</p>
                                                <p class="qty">Số lượng: <span>{{$row->qty}}</span></p>
                                                <p class="qty">Đơn giá: <span>{{number_format($row->price,0,'','.')}}đ</span></p>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                          
                    </div>
                    <div class="widget-foot" style="margin-top:40px">
                    <p>Tổng sản phẩm: {{Cart::count()}}</span></p>
                        <p><b>Tổng giá trị đơn hàng: {{Cart::total()}}</b> <span style="color:red"></span></p>
                    </div>


                    <a href="{{url('index')}}" class="btn_shopping">Tiếp tục mua sắm</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection









