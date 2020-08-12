@extends('layouts.admin')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h2 class="section-title"style="font-weight:bold">Thông tin đơn hàng</h2>
                </div>
                @php
                    $tranlate = array(
                        'public'=>'<span class="badge badge-success">Hoàn thành</span>',
                        'private'=>'<span class="badge badge-warning">Đang xử lý</span>',
                        'trash'=>'<span class="badge badge-secondary">Đang tiếp nhận</span>' 
                    );
                @endphp
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail">{{$info_orders->order_code}}</span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail">{{$info_orders->address}}</span>
                    </li>
                    <li>
                        <h3 class="title">Hình thức thanh toán</h3>
                        <span class="detail">{{$info_orders->ship_info}}</span>
                    </li>
                   
                    <li>
                        <h3 class="title">Tình trạng đơn hàng</h3>
                        <p>{!! $tranlate[$info_orders->order_status]!!}</p>
                    </li>
                  
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h2 class="section-title"style="font-weight:bold">Sản phẩm đơn hàng</h2>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $t=0;
                            @endphp
                          @foreach ($product_orders as $product_order)
                            @php
                               $t++;
                            @endphp
                          <tr>
                            <td class="thead-text">{{$t}}</td>
                            <td class="thead-text">
                                <div class="thumb">
                                    <img src="{{asset($product_order->thumb_product)}}" alt="">
                                </div>
                            </td>
                            <td class="thead-text">{{$product_order->product_name}}</td>
                            <td class="thead-text">{{number_format($product_order->price,0,'','.')}}đ</td>
                            <td class="thead-text">{{$product_order->qty}}</td>
                            <td class="thead-text">{{number_format($product_order->sub_total,0,'','.')}}đ</td>
                        </tr>
                          @endforeach
                           
                
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h2 class="section-title" style="font-weight:bold">Giá trị đơn hàng</h2>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total-fee">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee">{{$qty }} sản phẩm</span>
                            <span class="total-fee">{{number_format($total_price,0,'','.')}}đ</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection