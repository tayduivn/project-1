@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh slider
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('update.slider',$sliders->id)}} " enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="images">Hình ảnh</label>
                    <input type="file" name="file" class="form-control-file" id="images" cols="30" rows="5">
                    @error('file')
                       <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>    

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection