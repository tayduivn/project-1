@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"style="text-align:center;"><i style="font-size:22px;" class="fas fa-clipboard-check"></i> ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center; font-size:28px;">{{$count_public}}</h5>
                    <p class="card-text"style="text-align:center; ">Đơn hàng thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header"style="text-align:center;"><i style="font-size:22px;" class="fas fa-luggage-cart"></i> ĐƠN HÀNG ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title"style="text-align:center; font-size:28px;">{{$count_private}}</h5>
                    <p class="card-text"style="text-align:center;">Đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"style="text-align:center;"><i style="font-size:22px;" class="fas fa-coins"></i> DOANH THU HỆ THỐNG</div>
                <div class="card-body">
                <h5 class="card-title"style="text-align:center; font-size:28px;">{{number_format($total_price,0,'','.')}}đ</h5>
                    <p class="card-text"style="text-align:center;">Doanh thu hệ thống</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header"style="text-align:center;"><i style="font-size:22px;"  class="fas fa-shopping-cart"></i></i> ĐƠN HÀNG TIẾP NHẬN</div>
                <div class="card-body">
                    <h5 class="card-title"style="text-align:center; font-size:28px;">{{$count_trash}}</h5>
                    <p class="card-text"style="text-align:center;">Đơn hàng đang tiếp nhận</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        @if (session('status'))
        <div class="alert alert-success">
           {{session('status')}}
        </div>
        @endif

        @if (count($status_orders)>0)
        <div class="card-header font-weight-bold">
            ĐƠN HÀNG MỚI
        </div>
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
             
                <tbody>
                    @php
                        $t=0;
                    @endphp
                    @foreach ($status_orders as $status_order)
                    @php
                     $tranlate = array(
                            'public'=>'<span class="badge badge-success">Hoàn thành</span>',
                            'private'=>'<span class="badge badge-warning">Đang xử lý</span>',
                            'trash'=>'<span class="badge badge-secondary">Đang tiếp nhận</span>' );
                       $t++;
                    @endphp
                    <tr>
                        <th scope="row">{{$t}}</th>
                        <td>{{$status_order->order_code}}</td>
                        <td> {{$status_order->fullname}}</td>
                        <td><a href="#">{{$status_order->order_number}}</a></td>
                        <td>{{number_format($status_order->total_price,0,'','.')}}đ</td>
                        <td>{!!$tranlate[$status_order->status]!!}</td>
                        <td>{{$status_order->created_at}}</td>
                        <td><a href="{{route('order.detail',$status_order->id)}}">Chi tiết</a></td>
                        <td>
                            <a href="{{route('delete.dashboard',$status_order->id)}}"  onclick="return confirm('Bạn chắc chắn xóa đơn hàng này!')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                   
                </tbody>
                
            </table>
        
        </div>
       
       
        <div class="section-detail" style="text-align: center;
            margin-top: 25px;">
                <ul class="list-item " style="    display: inline-block;">
                    {{$status_orders->links()}}
                </ul>
        </div>
        @else
           {{-- <div class="card-body"> 
               <img style="width:100%" src="{{asset('admin/uploads/admin-2.png')}}">
            </div> --}}
            <script src="https://lichngaytot.com/Content/Js/Libs/jquery-3.4.1.min.js"></script><script src="https://lichngaytot.com/Content/Js/Libs/jquery-ui.min.js"></script><script src="https://lichngaytot.com/Content/Js/Widget/widgetlichngay.js"></script><script type="text/javascript">document.write('<div class="tao-lich-left widgetlich-lvsicsoft" id="widgetlich-lvsicsoft" style="width:auto;" data-urlimagen="" data-colorbordern="#dddddd" data-coloramn="#7f7f7f" data-colorduongn="#000000"></div>');getWidgetLichNgay("widgetlich-lvsicsoft");</script>
        @endif
        
    </div>

</div>
@endsection
