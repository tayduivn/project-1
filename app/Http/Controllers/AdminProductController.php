<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\User;
use App\tbl_list_order;
use App\tbl_info_order;
use App\tbl_list_customer;
use App\tbl_product_order;

class AdminProductController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']); //taa active
            return $next($request);
        });
    }
    //phần list product
    function add()
    {
        $product_cat_names = tbl_product_cat::all();

       
        return view('admin.product.add', compact('product_cat_names'));

    }
    function addstore(Request $request)
    {

        $request->validate(
            [
                'product_name' => ['required', 'string'],
                'product_code' => ['required', 'string'],
                'price_old' => ['required', 'string', 'max:255'],
                'price_new' =>  ['required', 'string', 'max:255'],
                'product_desc' =>  ['required', 'string'],
                'product_content' => ['required', 'string'],
                'file' =>  ['required'],
                'product_qty' =>  ['required', 'string', 'max:255'],
                'cat_id' =>  ['required', 'string', 'max:255'],

            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'product_name' => 'Tên sản phẩm',
                'product_code' => 'Mã sản phẩm',
                'price_old' => 'Giá cũ',
                'price_new' =>  'Giá mới',
                'product_desc' =>  'Chi tiết sản phẩm',
                'product_content' => 'Mô tả sản phẩm',
                'file' =>  'Hình ảnh',
                'product_qty' =>  'Số lượng',
                'cat_id' => 'Danh mục',

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
            $input['product_thumb'] = $thumbnail; //lưu ảnh
        }
        $new = tbl_product::create($input);//add vào bảng tbl_products
        
     
        tbl_product_img::create([//đồng thời add ảnh và id vào bảng tbl_product_imgs
            'product_id'=>$new->id,
            'product_img' => $thumbnail,
        ]);

        return redirect('admin/product/list')->with('status', 'Đã thêm sản phẩm thành công');
    }

    function list(Request $request)
    {
        // $user=Auth::user();
        // $cats=tbl_product::with('tblproductcat')->get();
       
        $list_act = [
            'delete' => 'Xóa',
        ];
        $keyword = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        $product = tbl_product::where('product_name', 'LIKE', "%{$keyword}%")->paginate(10);
        $products = tbl_product::where('product_name', 'LIKE', "%{$keyword}%")->paginate(5);
        $cats = tbl_product_cat::all();
        
        $count_product = tbl_product::count();
        $count = [$count_product];


        $status = $request->input('status');//lấy trạng thái
        if ($status == 'Còn hàng') {//trạng thái còn hàng
            $products = tbl_product::where('status_product','=','Còn hàng')->paginate(10); //vo hieu hoa
        }elseif ($status == 'Hết hàng') {//trạng thái hết hàng
            $products = tbl_product::where('status_product','=',"Hết hàng")->paginate(10); //vo hieu hoa
        }
        $list_public = tbl_product::where('status_product', '=', 'Còn hàng')->get();
        $list_private = tbl_product::where('status_product', '=', 'Hết hàng')->get();

       
        return view('admin.product.list', compact('products','count_product', 'cats', 'product', 'list_act', 'count','list_public','list_private'));
        


      
    }

    function delete($id) //xoa sản phẩm
    {
        $products = tbl_product::find($id);
        $products->delete();
        return redirect('admin/product/list')->with('status', 'Bạn đã xóa sản phẩm thành công');
    }
    function edit($id)
    {
        $products = tbl_product::find($id);
        $product_cat_names = tbl_product_cat::all();
        
        return view('admin.product.edit', compact('products', 'product_cat_names'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'product_name' => ['required', 'string'],
                'product_code' => ['required', 'string'],
                'price_old' => ['required', 'string', 'max:255'],
                'price_new' =>  ['required', 'string', 'max:255'],
                'product_desc' =>  ['required', 'string'],
                'product_content' => ['required', 'string'],
                'product_qty' =>  ['required', 'string', 'max:255'],
                'status_product'=>['required', 'string'],

            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'product_name' => 'Tên sản phẩm',
                'product_code' => 'Mã sản phẩm',
                'price_old' => 'Giá cũ',
                'price_new' =>  'Giá mới',
                'product_desc' =>  'Chi tiết sản phẩm',
                'product_content' => 'Mô tả sản phẩm',
                'product_qty' =>  'Số lượng',
                'status_product'=>'Tình trạng sản phẩm',
            ]

        );

        // return $request->all();
        tbl_product::where('id', $id)->update([
            'product_name' => $request->input('product_name'),
            'product_code' => $request->input('product_code'),
            'price_old' => $request->input('price_old'),
            'price_new' =>  $request->input('price_new'),
            'product_desc' =>  $request->input('product_desc'),
            'product_content' => $request->input('product_content'),
            'product_qty' =>  $request->input('product_qty'),
            'status_product' =>  $request->input('status_product'),
        ]);
        return redirect('admin/product/list')->with('status', 'Bạn đã cập nhật thành công sản phẩm');
    }
    function acdition(Request $request)//phần tác vụ của product
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    tbl_product::destroy($list_check);
                    return redirect('admin/product/list')->with('status', 'Bạn đã xóa sản phẩm thành công');
                }
            }
            return redirect('admin/product/list')->with('status', 'Bạn không thể thao tác trên sản phẩm của bạn');
        } else {
            return redirect('admin/product/list')->with('status', 'Bạn cần chọn sản phẩm cần thực thi');
        }
    }

    //media ảnh liên quan
    function media(Request $request, $id)
    {
        //echo $request->id; 
        $addaction = $request->id;

       
        return view('admin.product.media', compact('addaction'));
    }
    function mediaaction(Request $request, $id)
    {

        $request->validate(
            [
                'file' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'file' => 'Tên hình ảnh',
            ]

        );

        //upload ảnh 
        //luu dữ liệu ảnh vào server
        // $input = $request->all(); //luu dữ liệu ảnh vào server
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
            //$input['product_img'] = $thumbnail; //lưu ảnh
        }


        // $product=tbl_product::all();
        //return $request->all();

        tbl_product_img::create([
            'product_id' => $request->id,
            'product_img' => $thumbnail,
        ]);
        return redirect('admin/product/list')->with('status', 'Đã thêm ảnh thành công');
    }

    //phần cat_product
    function store(Request $request)
    {
        $request->validate(
            [
                'cat_name' => ['required', 'string'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'cat_name' => 'Tên danh mục',
            ]

        );
        //return $request->all();
        tbl_product_cat::create([
            'cat_title' => $request->input('cat_name'),

        ]);
        return redirect('admin/product/cat/list')->with('status', 'Đã thêm danh mục thành công');
    }

    function catlist()
    {
        $list_act = [
            'delete' => 'Xóa',
        ];
        $product_cats = tbl_product_cat::all();

       
        return view('admin.product.cat', compact('product_cats', 'list_act'));
    }

    function deletecat($id) //xoa cat
    {

        $product_cats = tbl_product_cat::find($id);
        $product_cats->delete();
        return redirect('admin/product/cat/list')->with('status', 'Bạn đã xóa danh mục thành công');
    }

    function cataction(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) {//nếu trùng id thì không hiển thi tác vụ xóa
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    tbl_product_cat::destroy($list_check);
                    return redirect('admin/product/cat/list')->with('status', 'Bạn đã xóa danh mục thành công');
                }
            }
            return redirect('admin/product/cat/list')->with('status', 'Bạn không thể thao tác trên danh mục của bạn');
        } else {
            return redirect('admin/product/cat/list')->with('status', 'Bạn cần chọn danh mục cần thực thi');
        }
    }

    //editcat
    function editcat($id)
    {
        $product_cat = tbl_product_cat::find($id);
        return view('admin.product.edit_cat', compact('product_cat'));
    }
    function updatecat(Request $request, $id)
    {
        $request->validate(
            [
                'cat_name' => ['required', 'string', 'max:255'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'cat_name' => 'Tên danh mục',
            ]

        );
        // return $request->all();
        tbl_product_cat::where('id', $id)->update([
            'cat_title' => $request->input('cat_name'),
        ]);
        return redirect('admin/product/cat/list')->with('status', 'Bạn đã cập nhật thành công');
    }
}
