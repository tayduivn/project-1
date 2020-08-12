@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if (session('status'))
        <div class="alert alert-success">
           {{session('status')}}
        </div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="">
                    <input type="text" name="keyword" value="{{request()->input('keyword')}}" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{url('admin/order/list')}}" class="text-primary">Tất cả<span class="text-muted">({{count($orderss)}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Đang tiếp nhận<span class="text-muted">({{count($list_trash)}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'private'])}}" class="text-primary">Đang xử lý<span class="text-muted">({{count($list_private)}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'public'])}}" class="text-primary">Hoàn thành<span class="text-muted">({{count($list_public)}})</span></a>
            </div>
            <form action="{{url('admin/order/action')}}" method="GET">
                @csrf
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" name="act" id="">
                        <option>Chọn</option>
                        @foreach ($list_act as $k=>$act)
                            <option value="{{$k}}">{{$act}}</option>
                        @endforeach
                    
                        
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                <p style="float:right;">Hiện tại có {{count($orders)}}/{{count($orderss)}} đơn hàng trong trang này</p>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Mã</th>
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

                        @if (count($orders)>0)
                        @foreach ($orders as $order)
                        @php
                        $tranlate = array(
                            'public'=>'<span class="badge badge-success">Hoàn thành</span>',
                            'private'=>'<span class="badge badge-warning">Đang xử lý</span>',
                            'trash'=>'<span class="badge badge-secondary">Đang tiếp nhận</span>' );
                            $t++;
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{$order->id}}">
                            </td>
                            <td>{{$t}}</td>
                            <td>{{$order->order_code}}</td>
                            <td>
                                {{$order->fullname}} <br>
                            </td>
                        
                            <td>{{$order->order_number}}</td>
                            <td>{{number_format($order->total_price,0,'','.')}}đ</td>
                            <td>{!! $tranlate[$order->status] !!}</td>
                            <td>{{$order->created_at}}</td>
                            <td><a href="{{route('order.detail',$order->id)}}">Chi tiết</a></td>
                            <td>
                                <a href="{{route('delete.order',$order->id)}}"  onclick="return confirm('Bạn chắc chắn xóa đơn hàng này!')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    
                        @endforeach
                        @else
                        <tr >
                            <td colspan='10'>Không tìm thấy tên thành viên</td>
                        <tr>
                        @endif

                       
                    </tbody>
                </table>
            </form>
           
            <div class="section-detail" style="text-align: center;
            margin-top: 25px;">
                <ul class="list-item " style="    display: inline-block;">
                    {{$orders->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection