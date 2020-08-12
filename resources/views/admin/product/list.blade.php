
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
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body" >
            <div class="analytic">
                <a href="{{url('admin/product/list')}}" class="text-primary">Tất cả<span class="text-muted">({{$count_product}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'Hết hàng'])}}" class="text-primary">Hết hàng<span class="text-muted">({{count($list_private)}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'Còn hàng'])}}" class="text-primary">Còn hàng<span class="text-muted">({{count($list_public)}})</span></a>
            </div>
            <form action="{{url('admin/product/acdition')}}" method="POST">
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
            <p style="float:right;">Có {{$count[0]}} sản phẩm trong danh sách</p>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Giá cũ</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $t=0;
                    @endphp
                    @if ($products->total()>0)
                    @foreach ($products as $product)
                    @php
                    $t++;
                     @endphp
                    <tr class="">
                        <td>
                            <input type="checkbox"name="list_check[]" value="{{$product->id}}">
                        </td>
                        <td>{{$t}}</td>
                        <td><img style="width:80px;height:80px;" src="{{asset($product->product_thumb)}}" alt=""></td>
                        <td><a href="#">{{$product->product_name}}</a></td>
                        <td><a href="#">{{$product->product_qty}}</a></td>
                        <td>{{number_format($product->price_new,0,'','.')}}đ</td>
                        <td>{{number_format($product->price_old,0,'','.')}}đ</td>
                        @foreach ($cats as $cat)
                            @if ($cat->id==$product->cat_id)
                               <td> {{$cat->cat_title}}</td>
                            @endif
                        @endforeach
    
                        <td>{{$product->created_at}}</td>

                        @if ($product->status_product == 'Hết hàng')
                            <td><span class="badge badge-warning">{{$product->status_product}}</span></td>
                        @else
                            <td><span class="badge badge-success">{{$product->status_product}}</span></td>
                        @endif

                        <td>
                            <a href="{{route('product.edit',$product->id)}}"onclick="return confirm('Bạn muốn cập nhật thông tin bản ghi này!')" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('delete_product',$product->id)}}"  onclick="return confirm('Bạn chắc chắn xóa bản ghi này!')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            <a href="{{route('product.media',$product->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Media"><i class="fa fa-file-image"></i></a>
                        </td>

                        
                    </tr>
                    
                    @endforeach
                    @else
                            <tr >
                                <td colspan='10'>Không tìm thấy tên sản phẩm</td>
                            <tr>
                    @endif
                </tbody>

            </table>
            </form>
   
                    <div class="section-detail" style="text-align: center;
                        margin-top: 25px;">
                            <ul class="list-item " style="    display: inline-block;">
                                {{ $products->links()}}                 
                            </ul>
                    </div>
        </div>
       
    </div>
   
</div>

@endsection
