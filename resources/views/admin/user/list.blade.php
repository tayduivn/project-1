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
            <h5 class="m-0 ">Danh sách thành viên</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="text" class="form-control form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>
            </div>
            <form action="{{url('admin/user/action')}}" method="POST">
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
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $t=0;
                        @endphp
                        @if ($users->total()>0)
                        @foreach ($users as $user)
                        @php
                        $t++;
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{$user->id}}">
                            </td>
                            <th scope="row">{{$t}} </th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            @foreach ($cat_roles as $cat_role)
                            @if ($cat_role->id==$user->role_id)
                               <td> {{$cat_role->name}}</td>
                            @endif
                            @endforeach

                            {{-- <td>{{$user->role_id}}</td> --}}
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                @if (Auth::id()!= $user->id)
                                <a href="{{route('delete_user',$user->id)}}" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                @endif
                                
                            </td>
                        </tr>
    
                        @endforeach
                        @else
                            <tr >
                                <td colspan='7'>Không tìm thấy tên thành viên</td>
                            <tr>
                        @endif
    
    
                    </tbody>
                </table>
            </form>
            
            
            <div class="section-detail" style="text-align: center;
            margin-top: 25px;">
                <ul class="list-item " style="    display: inline-block;">
                    {{$users->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection