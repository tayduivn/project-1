<?php

namespace App\Http\Controllers;

use App\tbl_list_slider;
use Illuminate\Http\Request;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\User;

class IndexController extends Controller
{
    //
    function index(){
        $categories=tbl_product_cat::all();
        session(['categories'=>$categories]);
        $list_mobiles=tbl_product::where('cat_id','=','13')->paginate(10);
        $list_laptops=tbl_product::where('cat_id','=','12')->paginate(10);
        $list_watchs=tbl_product::where('cat_id','=','15')->paginate(10);
        $list_bestsellings=tbl_product::where('best_selling','=','1')->get();
        // $list_populars=tbl_product::where('popular','=','1')->get();
        $list_populars=tbl_product::limit(6)->orderBy('id','desc')->get();
        $list_sliders=tbl_list_slider::all();
      // return $list_populars;
        
        return view('index',compact('categories','list_mobiles','list_laptops','list_watchs','list_bestsellings','list_populars','list_sliders'));
    }
}
