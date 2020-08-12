@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
           Cập nhật thông tin 
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user.update',$user->id)}}">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}"id="name">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="{{$user->email}}" id="email" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Mật khẩu</label>
                    <input class="form-control" type="password"   name="password" id="password">
                    @error('password')
                       <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm">Xác nhận mật khẩu</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password-confirm">
                   
                </div>



                <div class="form-group">
                    
                    @if ($users->role->name == 'Admin')
                        <label for="">Nhóm quyền</label>
                        <select class="form-control" name="role_id" id="">
                            <option>Chọn quyền</option>
                            @foreach ($roles as $role)
                            <option <?php if($role->id==$user->role_id) echo 'selected="selected"'; ?> value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach   
                        </select>
                        @error('role_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    @endif
                    
                    
                </div>
                <button type="submit" name="btn-add" value="Thêm mới" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection