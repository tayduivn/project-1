@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa danh mục
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('product.updatecat',$product_cat->id)}}">
                @csrf
                           
                <div class="form-group">
                    <label for="cat_product">Danh mục</label>
                    <input class="form-control" type="text" value="{{$product_cat->cat_title}}" name="cat_name" id="cat_product">
                    @error('cat_name')
                       <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
               
                <input type="submit" name="btn-search" value="Cập nhật" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection