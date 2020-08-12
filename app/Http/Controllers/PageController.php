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
class PageController extends Controller
{
    //
    function show(){
        $pages=tbl_page::paginate(10);
        $list_bestsellings=tbl_product::where('best_selling','=','1')->get();
        return view('page.show',compact('pages','list_bestsellings'));
    }
    function detail($id){
        $details=tbl_page::find($id);
        $list_bestsellings=tbl_product::where('best_selling','=','1')->get();
        return view('page.detail',compact('details','list_bestsellings'));
    }
}
