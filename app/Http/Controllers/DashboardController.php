<?php

namespace App\Http\Controllers;
use App\Charts\UserChart;
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
class DashboardController extends Controller
{
    //
   function __construct(){
        $this->middleware(function($request,$next){
            session(['module_active'=>'dashboard']);
            return $next($request);
        });
      
        
   }


    function show(){


        $infos=tbl_list_order::where('status','=','trash')->orderBy('id','desc')->get();//lấy thông báo đơn hàng
        $infos1=tbl_list_order::where('status','=','trash')->count();//lấy thông báo đơn hàng
        session(['infos'=>$infos]);
        session(['count'=>$infos1]);
       //đếm tình trạng đơn hàng 
        $count_public=tbl_list_order::where('status','=','public')->count();//đếm
        $count_private=tbl_list_order::where('status','=','private')->count();
        $count_trash=tbl_list_order::where('status','=','trash')->count();
       //lấy thong tin đơn hàng mới
       $status_orders=tbl_list_order::where('status','=','trash')->orderBy('id','desc')->simplepaginate(5);//lấy đơn hàng mới
       $price_orders=tbl_list_order::where('status','=','public')->get();//lấy tổng giá của đơn hàng hoàn thành
       $total_price = 0;//lấy tổng giá
       
       foreach ( $price_orders as $item) {
           $total_price += $item['total_price'];
       }
      
       return view('admin.dashboard',compact('count_public','count_private','count_trash','status_orders','total_price'));
    }
    function delete($id) //xoa đơn hàng
    {
        $products = tbl_list_order::find($id);
        $products->delete();
        return redirect('dashboard')->with('status', 'Bạn đã xóa đơn hàng thành công');
    }
}
