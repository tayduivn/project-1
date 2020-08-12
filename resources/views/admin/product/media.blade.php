@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Media
        </div>
        <div class="card-body">
            
            <form method="POST" action="{{route('product.addmedia',$addaction)}} " enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">                       
                <div class="form-group">
                    <label for="images">Hình ảnh</label>
                    <input type="file" name="file" class="form-control-file" id="images" cols="30" rows="5">
                    @error('file')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                </div>              
                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
            </form>
           
        </div>
    </div>
</div>
@endsection