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
            <h5 class="m-0 ">Danh sách slider</h5>
        </div>
        <div class="card-body">
            <form action="{{url('admin/slider/slideraction')}}" method="POST">
                @csrf
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" name="act"id="">
                        <option>Chọn</option>
                        @foreach ($list_act as $k=>$act)
                        <option value="{{$k}}">{{$act}}</option>
                        @endforeach
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                <div style='float:right;'>
                <p>Có {{$sliderss}}/{{$slidersss}} ảnh slider trong trang này</p>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $t=0;
                        @endphp
                        @foreach ($sliders as $slider)
                        @php
                        $t++;
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{$slider->id}}">
                            </td>
                            <td scope="row">{{$t}}</td>
                            <td><img style='with:80px;height:40px;' src="{{asset($slider->product_thumb)}}" alt=""></td>
                            <td>{{$slider->created_at}}</td>
                            <td><a href="{{route('edit.slider',$slider->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                    
                                <a href="{{route('delete.slider',$slider->id)}}" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                    
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </form>
          
            <div class="section-detail" style="text-align: center;
                        margin-top: 25px;">
                            <ul class="list-item " style="    display: inline-block;">
                                {!!$sliders->links()!!}
                            </ul>
                        </div>
        </div>  
    </div>
</div>

@endsection