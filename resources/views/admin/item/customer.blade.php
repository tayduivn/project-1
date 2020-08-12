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
            <h5 class="m-0 ">Danh sách khách hàng</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" name="keyword" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('admin/customer/actioncustomer')}}" method="POST">
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
                <p style="float:right;">Hiện tại có {{count($customers)}}/{{count($customerss)}} khách hàng trong trang này</p>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Đơn hàng</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $t=0;
                        @endphp
                        @if (count($customers)>0)
                        @foreach ($customers as $customer)
                        @php
                        $t++;
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{$customer->id}}">
                            </td>
                            <td>{{$t}}</td>
                            <td>{{$customer->fullname}}</td>
                            <td><a href="#">{{$customer->phone_number}}</a></td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->address}}</td>
                            @foreach ($orders as $order)
                            @if ($order->id==$customer->order_id)
                            <td> {{$order->order_code}}</td>
                            @endif
                            @endforeach
                            <td>{{$customer->created_at}}</td>
                            <td>
                            <a href="{{route('delete.customer',$customer->id)}}" onclick="return confirm('Bạn chắc chắn xóa khách hàng này!')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach
                        @else
                            <tr>
                                <td colspan='10'>Không tìm thấy tên khách hàng</td>
                            <tr>
                        @endif
                    </tbody>
                </table>
            </form>
          
            <div class="section-detail" style="text-align: center;
            margin-top: 25px;">
                <ul class="list-item " style="    display: inline-block;">
                    {{$customers->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection