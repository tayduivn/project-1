<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
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

class AdminOrderController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']); //tao active
            return $next($request);
        });
       
    }
    function delete($id) //xoa đơn hàng
    {
        $products = tbl_list_order::find($id);
        $products->delete();
        return redirect('admin/order/list')->with('status', 'Bạn đã xóa đơn hàng thành công');
    }
    function list(Request $request)
    {
       
        $list_check = $request->input('list_check'); //lấy id check của đơn hàng
        $list_act = [ //danh sách tác vụ
            'public' => 'Hoàn thành',
            'private' => 'Đang xử lý',
            'trash' => 'Đang tiếp nhận',
            'delete' => 'Xóa',
        ];

        $keyword = ""; //tìm kiếm
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        $orders = tbl_list_order::where('fullname', 'LIKE', "%{$keyword}%")->paginate(10); //hiển thi số lượng đơn hàng trong 1 trang
        $orderss = tbl_list_order::all(); //lấy số lượng tất cả đơn hàng

        $list_public = tbl_list_order::where('status', '=', 'public')->get();
        $list_private = tbl_list_order::where('status', '=', 'private')->get();
        $list_trash = tbl_list_order::where('status', '=', 'trash')->get();

        $infos=tbl_list_order::where('status','=','trash')->orderBy('id','desc')->get();//lấy thông báo đơn hàng
        $infos1=tbl_list_order::where('status','=','trash')->count();//lấy thông báo đơn hàng
        session(['infos'=>$infos]);
        session(['count'=>$infos1]);

        $status = $request->input('status');//lấy trạng thái
        if ($status == 'trash') {//nếu là trash lấy ra đơn hàng đang tiếp nhận
            $orders = tbl_list_order::where('status','=','trash')->paginate(10); //vo hieu hoa
        }elseif ($status == 'private') {//nếu là trash lấy ra đơn hàng đang tiếp nhận
            $orders = tbl_list_order::where('status','=','private')->paginate(10); //vo hieu hoa
        }elseif ($status == 'public') {//nếu là trash lấy ra đơn hàng đang tiếp nhận
            $orders = tbl_list_order::where('status','=','public')->paginate(10); //vo hieu hoa
        }
        return view('admin.item.order', compact('orders', 'orderss', 'list_act', 'list_public', 'list_trash', 'list_private'));
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check'); //chọn các check có id có trạng thái đơn hàng
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act'); //lấy giá trị name

                if ($act == 'public') {
                    foreach ($list_check as $check) {
                        tbl_list_order::where('id', $check)->update([
                            'status' => 'public',
                        ]);
                    }
                    return redirect('admin/order/list')->with('status', 'Bạn đã cập nhật trạng thái thành công');
                } elseif ($act == 'private') {
                    foreach ($list_check as $check) {
                        tbl_list_order::where('id', $check)->update([
                            'status' => 'private',
                        ]);
                    }
                    return redirect('admin/order/list')->with('status', 'Bạn đã cập nhật trạng thái thành công');
                } elseif ($act == 'trash') {
                    foreach ($list_check as $check) {
                        tbl_list_order::where('id', $check)->update([
                            'status' => 'trash',
                        ]);
                    }
                    return redirect('admin/order/list')->with('status', 'Bạn đã cập nhật trạng thái thành công');
                } elseif ($act == 'delete') {
                    tbl_list_order::destroy($list_check);
                    return redirect('admin/order/list')->with('status', 'Bạn đã xóa đơn hàng thành công');
                }
            }
            return redirect('admin/order/list')->with('status', 'Bạn không thể thao tác trên tài khoản của bạn');
        } else {
            return redirect('admin/order/list')->with('status', 'Bạn cần chọn phần tử cần thực thi');
        }
    }

    function detail($id)
    { //trang chi tiết đơn hàng

        $info_orders = tbl_info_order::where('order_id', '=', $id)->first(); //lấy thông tin đơn hàng
        $product_orders = tbl_product_order::where('order_id', '=', $id)->get(); //lấy sản phẩm đơn hàng

        $total_price = 0;//lấy tổng giá
        $qty = 0;//lấy tổng số lượng
        foreach ($product_orders as $item) {
            $qty += $item['qty'];
            $total_price += $item['sub_total'];
        }
       
       
        return view('admin.item.detail', compact('product_orders', 'info_orders','qty','total_price'));
    }


    //admin-customer
    function listcustomer(Request $request){
        $list_act = [
            'delete' => 'Xóa',
        ];
        $orders=tbl_list_order::all();

        $keyword = ""; //tìm kiếm
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        $customers=tbl_list_customer::where('fullname', 'LIKE', "%{$keyword}%")->paginate(6);
        $customerss=tbl_list_customer::all();
        
        $infos=tbl_list_order::where('status','=','trash')->orderBy('id','desc')->get();//lấy thông báo đơn hàng
        $infos1=tbl_list_order::where('status','=','trash')->count();//lấy thông báo đơn hàng
        session(['infos'=>$infos]);
        session(['count'=>$infos1]);
        return view('admin.item.customer',compact('customers','customerss','orders','list_act'));
    }
    //xử lý tác vụ xóa
    function actioncustomer(Request $request){
        $list_check = $request->input('list_check'); //chọn các check có id
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act'); //lấy giá trị name

                if ($act == 'delete') {
                    tbl_list_customer::destroy($list_check);
                    return redirect('admin/customer/listcustomer')->with('status', 'Bạn đã xóa đơn hàng thành công');
                } 
            }
            return redirect('admin/customer/listcustomer')->with('status', 'Bạn không thể thao tác trên danh sách khách hàng của bạn');
        } else {
            return redirect('admin/customer/listcustomer')->with('status', 'Bạn cần chọn phần tử cần thực thi');
        }
    }
    function deletecustomer($id){
        $customers= tbl_list_customer::find($id);
        $customers->delete();
        return redirect('admin/customer/listcustomer')->with('status', 'Bạn đã xóa khách hàng thành công');
    }

   
}
