@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('admin/page/addpage')}} " enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="page_title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="page_title" id="page_title">
                    @error('page_title')
                    <small class="text-danger">{{$message}}</small>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="content">Mô tả ngắn</label>
                    <textarea name="page_desc" class="form-control" id="content" cols="30" rows="5"></textarea>
                    @error('page_desc')
                    <small class="text-danger">{{$message}}</small>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="page_content" class="form-control" id="content" cols="30" rows="5"></textarea>
                    @error('page_content')
                    <small class="text-danger">{{$message}}</small>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="images">Hình ảnh</label>
                    <input type="file" name="file" class="form-control-file" id="images" cols="30" rows="5">
                    @error('file')
                       <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>              
                
                <div class="form-group">
                    <label for="status">Người tạo</label>
                    <select class="form-control" name="user_id" id="status">
                        <option value="">Chọn người tạo</option>
                        @foreach ($users as $user)
                           <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                       
                                      
                    </select>
                    @error('user_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection