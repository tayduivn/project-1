<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\User;
use App\tbl_list_order;
use App\tbl_info_order;
use App\tbl_list_customer;
use App\tbl_product_order;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    //
    //b1.tạo route để tạo action xóa tam thoi
    //b2.tạo db add softDelete
    //b2.tạo và khai báo model
    //b3.viết các chức năng xử lý hàm 
    //b4.có phần list tạo các danh sách và phần action xử lý xóa 
    //b5.tạo {{request()->fullUrlWithQuery(['status'=>'active'])}}" ở form để tạo trang thái ở phần kích hoạt và vô hiệu hóa
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'page']); //tao active
            return $next($request);
        });
       
    }
    function add()
    {
        $users = User::all();
        
        return view('admin.page.add', compact('users'));
    }
    function addpage(Request $request)
    {

        $request->validate(
            [
                'page_title' => ['required', 'string'],
                'page_desc' => ['required', 'string'],
                'page_content' => ['required'],
                'file' =>  ['required'],
                'user_id' =>  ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'page_title' => 'Tiêu đề',
                'page_desc' => 'Mô tả ngắn',
                'page_content' => 'Nội dung bài viết',
                'file' =>  'Hình ảnh',
                'user_id' =>  'Tên người tạo',
            ]

        );
        //upload ảnh anh ơi
        $input = $request->all(); //luu dữ liệu ảnh vào server
        if ($request->hasFile('file')) {
            //lấy tên file
            //lấy đuôi file
            //lấy kích thước file
            $file = $request->file; //gọi đến 1 phần
            $filename = $file->getClientOriginalName(); //lấy tên file
            $file->getClientOriginalExtension(); //lấy đuôi file
            $file->getSize(); //lấy kích thước file
            $path =  $file->move('public/admin/uploads', $file->getClientOriginalName()); //lưu đường dẫn vào db
            $thumbnail = "admin/uploads/" . $filename; //đường dẫn chứa file          
            $input['page_img'] = $thumbnail; //lưu ảnh
        }


        tbl_page::create($input);

        return redirect('admin/page/list')->with('status', 'Đã thêm bài viết thành công');
    }

    function list(Request $request)
    {

        $status = $request->input('status');//lấy trạng thái
        $list_act = [
            'delete' => 'Xóa tạm thời',//danh sách ban đầu là xóa tạm thời
        ];
        if ($status == 'trash') {//nếu là vô hiệu hóa thì là tác vụ khoi phục và xóa vĩnh viễn
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn',
            ];
            $pages = tbl_page::onlyTrashed()->paginate(10); //vo hieu hoa
        } else {//nếu là active thì tìm kiếm
            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            $pages = tbl_page::where('page_title', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        $count_page_active = tbl_page::count();//đếm 
        $count_page_trash = tbl_page::onlyTrashed()->count(); //đếm tạm thoi khi xóa
        $count = [$count_page_active, $count_page_trash];

        $users = User::all();

     
        return view('admin.page.list', compact('pages', 'count','users', 'list_act'));
    }
    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    tbl_page::destroy($list_check);
                    return redirect('admin/page/list')->with('status', 'Bạn đã xóa thành công');
                }
                if ($act == 'restore') {
                    tbl_page::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/page/list')->with('status', 'Bạn đã khôi phục thành công');
                }

                if ($act == 'forceDelete') {
                    tbl_page::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/page/list')->with('status', 'Bạn đã xóa vĩnh viễn bài viết');
                }
            }
            return redirect('admin/page/list')->with('status', 'Bạn không thể thao tác trên bài viết của bạn');
        } else {
            return redirect('admin/page/list')->with('status', 'Bạn cần chọn phần tử cần thực thi');
        }
    }



    function delete($id) //xoa sản phẩm
    {
        $page = tbl_page::find($id);
        $page->delete();
        return redirect('admin/page/list')->with('status', 'Bạn đã xóa bản ghi thành công');
    }

    function edit($id) //sửa page
    {
        $pages = tbl_page::find($id);
        $users = User::all();
        return view('admin.page.edit', compact('pages', 'users'));
    }
    function update(Request $request, $id) //sửa page
    {
        $request->validate(
            [
                'page_title' => ['required', 'string'],
                'page_desc' => ['required', 'string'],
                'page_content' => ['required'],
                'file' =>  ['required'],
                'user_id' =>  ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'page_title' => 'Tiêu đề',
                'page_desc' => 'Mô tả ngắn',
                'page_content' => 'Nội dung bài viết',
                'file' =>  'Hình ảnh',
                'user_id' =>  'Tên người tạo',
            ]

        );
        //upload ảnh anh ơi
        //$input = $request->all(); //luu dữ liệu ảnh vào server
        if ($request->hasFile('file')) {
            //lấy tên file
            //lấy đuôi file
            //lấy kích thước file
            $file = $request->file; //gọi đến 1 phần
            $filename = $file->getClientOriginalName(); //lấy tên file
            $file->getClientOriginalExtension(); //lấy đuôi file
            $file->getSize(); //lấy kích thước file
            $path =  $file->move('public/admin/uploads', $file->getClientOriginalName()); //lưu đường dẫn vào db
            $thumbnail = "admin/uploads/" . $filename; //đường dẫn chứa file          
           // $input['page_img'] = $thumbnail; //lưu ảnh
        }
        // return $request->all();
        tbl_page::where('id', $id)->update([
            'page_title' => $request->input('page_title'),
            'page_desc' =>  $request->input('page_desc'),
            'page_content' =>  $request->input('page_content'),
            'page_img' =>  $thumbnail,
            'user_id' =>   $request->input('user_id'),
        ]);
        return redirect('admin/page/list')->with('status', 'Bạn đã cập nhật thành công bài viết');
    }
}
