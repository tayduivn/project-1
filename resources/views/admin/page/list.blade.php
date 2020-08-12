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
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" name="keyword" value="{{request()->input('keyword')}}"placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>
               
            </div>
            <form action="{{url('admin/page/action')}}" method="POST">
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
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $t=0;
                    @endphp
                    @if ($pages->total()>0)
                    @foreach ($pages as $page)
                    @php
                       $t++;
                    @endphp
                    <tr>
                        <td>
                            <input type="checkbox" name="list_check[]" value="{{$page->id}}">
                        </td>

                        <td scope="row">{{$t}}</td>
                        <td><img style="width:80px;height:80px;" src="{{asset($page->page_img)}}" alt=""></td>
                        <td><a href="">{{$page->page_title}}</a></td>
                        @foreach ($users as $user)
                        @if ($user->id==$page->user_id)
                            <td>{{$user->name}}</td>
                        @endif
                        @endforeach
                        <td>{{$page->created_at}}</td>
                        <td><a href="{{route('page.edit',$page->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('delete_page',$page->id)}}"  onclick="return confirm('Bạn có chắc chắn xóa bản ghi này')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                       

                    </tr>
                    @endforeach
                    @else
                            <tr >
                                <td colspan='7'>Không tìm thấy tên thành bài viết</td>
                            <tr>
                    @endif
                    
     
                </tbody>
              </table>
            </form>
            
            <div class="section-detail" style="text-align: center;
            margin-top: 25px;">
                <ul class="list-item " style="    display: inline-block;">
                    {{ $pages->links()}}
                </ul>
        </div>
        </div>
    </div>
</div>
@endsection