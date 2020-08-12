<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\tbl_list_slider;
use App\tbl_list_order;
use App\tbl_info_order;
use App\tbl_list_customer;
use App\tbl_product_order;
class AdminSliderController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'slider']); //tao active
            return $next($request);
        });
       
    }
    function add(){
        return view('admin.slider.add');
    }
    function actionslider(Request $request){
        $request->validate(
            [
                'file' =>  ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [               
                'file' =>  'Hình ảnh',    
            ]
        );
        //upload ảnh anh ơi
       
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
           
        }


        tbl_list_slider::create([
            'product_thumb'=>$thumbnail,
        ]);

        return redirect('admin/slider/list')->with('status', 'Đã thêm slider thành công');
    }

    function list(Request $request){//danh sách slider
       
       

            $sliders=tbl_list_slider::paginate(3);
            $list_act = [
                'delete' => 'Xóa',
            ];
            
            $sliderss=tbl_list_slider::paginate(3)->count();
            $slidersss=tbl_list_slider::count();
            return view('admin.slider.list',compact('sliders','list_act','sliderss','slidersss'));
       
       
    }
    

    function delete($id){//xóa slider
        $sliders = tbl_list_slider::find($id);
        $sliders->delete();
        return redirect('admin/slider/list')->with('status', 'Bạn đã xóa slider thành công');

    }

    function edit($id) //sửa page
    {
        $sliders = tbl_list_slider::find($id);
       
        return view('admin.slider.edit', compact('sliders'));
    }
    function update(Request $request, $id) //sửa page
    {
        $request->validate(
            [
                'file' =>  ['required'],   
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [            
                'file' =>  'Hình ảnh',            
            ]
        );
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
          
        }
        // return $request->all();
        tbl_list_slider::where('id', $id)->update([
            'product_thumb' =>  $thumbnail,
        ]);
        return redirect('admin/slider/list')->with('status', 'Bạn đã cập nhật thành công slider');
    }

    function slideraction(Request $request){
        $list_check = $request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    tbl_list_slider::destroy($list_check);
                    return redirect('admin/slider/list')->with('status', 'Bạn đã xóa slider thành công');
                }
            }
            return redirect('admin/slider/list')->with('status', 'Bạn không thể thao tác trên trang slider của bạn');
        } else {
            return redirect('admin/slider/list')->with('status', 'Bạn cần chọn phần tử cần thực thi');
        }
    }
}
