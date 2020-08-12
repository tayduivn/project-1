<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\User;
use App\Role;
use App\tbl_list_order;
use App\tbl_info_order;
use App\tbl_list_customer;
use App\tbl_product_order;

class AdminUserController extends Controller
{
    //
    function __construct(){
        $this->middleware(function($request,$next){
            session(['module_active'=>'user']);//taa active
            return $next($request);
        });
   }

    function list(Request $request)
    {

        $status = $request->input('status');
        $list_act = [
            'delete' => 'Xóa tạm thời',
        ];
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn',
            ];
            $users = User::onlyTrashed()->paginate(10); //vo hieu hoa
        } else {
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            $users = User::where('name', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count(); //đếm tạm thoi khi xóa
        $count = [$count_user_active, $count_user_trash];
        
        $cat_roles=Role::all();
       
        return view('admin.user.list', compact('users', 'count', 'list_act','cat_roles'));
    }
    function add()
    {

        $roles=Role::all();
        return view('admin.user.add',compact('roles'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role_id'=>['required', 'string'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',
            ],
            [
                'name' => 'Tên Đăng Nhập',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'role_id'=>'Quyền thành viên',
            ]

        );
        // return $request->all();
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'=>$request->input('role_id'),
        ]);
        return redirect('admin/user/list')->with('status', 'Đã thêm thành viên thành công');
    }
    function delete($id)
    {
        if (Auth::id() != $id) { //kiểm tra thành viên đang dăng nhập có khác với thành viên khác không nếu khác thì thực hiện xóa
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành viên thành công');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành viên không thành công');
        }
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) {
                    unset($list_check[$k]);
                }
            }

            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành công');
                }
                if ($act == 'restore') {
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/user/list')->with('status', 'Bạn đã khôi phục thành công');
                }

                if ($act == 'forceDelete') {
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa vĩnh viễn user');
                }
            }
            return redirect('admin/user/list')->with('status', 'Bạn không thể thao tác trên tài khoản của bạn');
        } else {
            return redirect('admin/user/list')->with('status', 'Bạn cần chọn phần tử cần thực thi');
        }
    }

    function edit($id)
    { 
        $user=User::find($id);
        $roles=Role::all();
        $users = Auth::user();
        return view('admin.user.edit', compact('user','roles','users'));
    }
    function update(Request $request,$id){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],               
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',
            ],
            [             
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ]

        );
        // return $request->all();
        User::where('id',$id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect('admin/user/list')->with('status', 'Bạn đã cập nhật thành công');
    }
}
