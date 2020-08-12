@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
           Chỉnh sửa sản phẩm
        </div>
        <div class="card-body">
            {{--  {!! Form::open(['url'=>'admin/product/addstore','method'=>'POST','files'=>true]) !!}  --}}
            <form method="POST" action="{{route('product.update',$products->id)}} " enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm</label>
                            <input class="form-control" type="text"value="{{$products->product_name}}" name="product_name" id="product_name">
                            @error('product_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_code">Mã sản phẩm</label>
                            <input class="form-control" type="text" value="{{$products->product_code}}" name="product_code" id="product_code">
                            @error('product_code')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price_new">Giá</label>
                            <input class="form-control" type="text"value="{{$products->price_new}}" name="price_new" id="price_new">
                            @error('price_new')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price_old">Giá cũ</label>
                            <input class="form-control" type="text"value="{{$products->price_old}}" name="price_old" id="price_old">
                            @error('price_old')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="qty">Số lượng</label>
                            <input class="form-control" type="text"value="{{$products->product_qty}}" name="product_qty" id="qty">
                            @error('product_qty')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="desc">Mô tả sản phẩm</label>
                            <textarea name="product_desc" class="form-control" id="desc" cols="30" rows="5">{{$products->product_desc}}</textarea>
                            @error('product_desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="detail">Chi tiết sản phẩm</label>
                    <textarea name="product_content" class="form-control"id="detail" cols="30" rows="5">{{$products->product_content}}</textarea>
                            @error('product_content')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                </div>
              

                <div class="form-group">
                    <label for="title">Danh mục</label>
                    <select class="form-control" name="cat_id" id="title">
                        <option value="">Chọn danh mục</option>
                        @foreach ($product_cat_names as $product_cat_name)
                           <option value="{{$product_cat_name->id}}"<?php if($product_cat_name->id==$products->cat_id) echo 'selected="selected"'; ?>>{{$product_cat_name->cat_title}}</option>
                        @endforeach
                    </select>
                    @error('cat_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="status">Tình trạng</label>
                    <select class="form-control" name="status_product" id="status">
                        <option value="">Chọn tình trạng</option>
                        <option value="Còn hàng">Còn hàng</option>
                        <option value="Hết hàng">Hết hàng</option>     

                            {{--  @if ($products->status_product=='Còn hàng')
                                 <option value="Còn hàng">{{$products->status_product}}</option>
                            @elseif($products->status_product=='Hết hàng')
                                 <option value="Hết hàng">{{$products->status_product}}</option>
                            @endif  --}}
                                
                    </select>
                    @error('status_product')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary" name="btn-add">Cập nhật</button>
            </form>
            {{--  {!! Form::close() !!}  --}}
        </div>
    </div>
</div>
@endsection