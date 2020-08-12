@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    @if (session('status'))
    <div class="alert alert-success">
       {{session('status')}}
    </div>
    @endif
    <div class="row">
      
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm danh mục sản phẩm
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('admin/product/store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="cat_name" value="{{request()->input('name')}}" id="name">
                            @error('cat_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                   Tên danh mục
                </div>
                <div class="card-body">
                    <form action="{{url('admin/product/cat/action')}}" method="POST">
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
                                <th scope="col">STT</th>
                                <th scope="col">ID danh mục</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $t=0;
                            @endphp
                            @foreach ($product_cats as $product_cat)
                            @php
                            $t++;
                            @endphp
                            <tr>
                                <td>
                                    <input type="checkbox" name="list_check[]" value="{{$product_cat->id}}">
                                </td>
                                <th scope="row">{{$t}}</th>
                                <td>{{$product_cat->id}}</td>
                                <td>{{$product_cat->cat_title}}</td>
                                <td>Trung lê</td>
                                <td>{{$product_cat->created_at}}</td>    
                                <td>
                                    <a href="{{route('product.editcat',$product_cat->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                   
                                    <a href="{{route('deletecat_product',$product_cat->id)}}" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                 
                                </td>                          
                            </tr>
                            @endforeach
                           
                                               
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection