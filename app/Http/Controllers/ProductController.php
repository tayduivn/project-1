<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\User;
use App\tbl_comment_product;
class ProductController extends Controller
{
    //
    function show(Request $request, $id)
    {
        $products = tbl_product::where('cat_id', $id)->paginate(4); //lấy list sản phẩm theo danh mục
        $product_cat_id = tbl_product::where('cat_id', $id);
        $categories = tbl_product_cat::all(); //lấy tất cả danh mục
        $caterows = tbl_product_cat::find($id); //lấy tên danh mục

        //đếm số lượng
        $count_product = tbl_product::where('cat_id', $id)->paginate(4)->count(); //đếm số lượng sản phẩm trong phân trang
        $count_product_cat_id = tbl_product::where('cat_id', $id)->count(); //đếm số lượng sản phẩm trong cat_id
        $count = [$count_product, $count_product_cat_id];
        //sắp xếp giá và tên theo alpha
        if ($request->input('select') == "sort_asc_by_name") {
            $products = tbl_product::where('cat_id', $id)->orderBy('product_name', 'asc')->paginate(4);
        } elseif ($request->input('select') == "sort_desc_by_name") {
            $products = tbl_product::where('cat_id', $id)->orderBy('product_name', 'desc')->paginate(4);
        } elseif ($request->input('select') == "sort_desc_by_price") {
            $products = tbl_product::where('cat_id', $id)->orderBy('price_new', 'desc')->paginate(4);
        } elseif ($request->input('select') == "sort_asc_by_price") {
            $products = tbl_product::where('cat_id', $id)->orderBy('price_new', 'asc')->paginate(4);
        }


        //lọc giá sản phẩm theo phân trang
        if ($request->input('r_price')  == "500000") {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['price_new', '<', '500000'],
            ])->paginate(4);
        } else if ($request->input('r_price') == "500000-1000000") {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['price_new', '>', '500000'],
                ['price_new', '<=', '1000000'],
            ])->paginate(4);
        } else if ($request->input('r_price') == "1000000-5000000") {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['price_new', '>', '1000000'],
                ['price_new', '<=', '5000000'],
            ])->paginate(4);
        } else if ($request->input('r_price') == "5000000-10000000") {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['price_new', '>', '5000000'],
                ['price_new', '<=', '10000000'],
            ])->paginate(4);
        } else if ($request->input('r_price') == "10000000") {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['price_new', '>', '10000000'],
            ])->paginate(4);
        }

        //lọc hãng
        if ($request->input('r_brand') == 'dell') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%dell%'],
            ])->paginate(4);
        } elseif ($request->input('r_brand') == 'apple') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%apple%'],
            ])->paginate(4);
        } elseif ($request->input('r_brand') == 'hp') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%hp%'],
            ])->paginate(4);
        } elseif ($request->input('r_brand') == 'lenovo') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%lenovo%'],
            ])->paginate(4);
        } elseif ($request->input('r_brand') == 'samsung') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%samsung%'],
            ])->paginate(4);
        } elseif ($request->input('r_brand') == 'realme') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%realme%'],
            ])->paginate(4);
        } elseif ($request->input('r_brand') == 'oppo') {
            $products = tbl_product::where([
                ['cat_id', '=', $id],
                ['product_name', 'like', '%oppo%'],
            ])->paginate(4);
        }


        return view('product.show', compact('products', 'categories', 'caterows', 'count'));
    }

    //phần chi tiết sản phẩm
    function detail(Request $request,$id)
    {

        $caterows = tbl_product::find($id); //lấy tên sản phẩm//có khóa chính
        $categories = tbl_product_cat::all(); //lấy danh mục sản phẩm
        $products = tbl_product::all(); //lấy sản phẩm
        $product_details = tbl_product::find($id); //lấy phần chi tiết sản phẩm
        $product_imgs = tbl_product_img::where('product_id', '=', $id)->get(); //lấy chi tiết ảnh lien quan
        //sản phẩm cùng chuyên mục
        $cate_products = tbl_product::where('cat_id', '=', $caterows->cat_id)->get();
        // echo "<pre>";
        // print_r($cate_products);
        // echo "<pre>";die;
        //lấy breadcamp
        $cats = tbl_product_cat::where('id', '=', $caterows->cat_id)->first();//lấy danh mục trên breadcamp
        $comments=tbl_comment_product::where('com_id','=',$id)->orderBy('id','desc')->paginate(5);
        
        return view('product.detail', compact('categories', 'product_details', 'product_imgs', 'cate_products', 'caterows', 'cats','addaction ','comments'));
    }


    //xử lý bình luận
    function comment_product(Request $request,$id){
      
        $request->validate(
            [
                'email' => ['required'],
                'name' => ['required'],
                'comment' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'email' => 'Email',
                'name' => "Tên",
                'comment' => 'Bình luận'
            ]

        );
       
       
        tbl_comment_product::create([
            'com_id'=>$request->id,
            'email'=>$request->input('email'),
            'name'=>$request->input('name'),
            'comment'=> $request->input('comment'),
           
        ]);

        return redirect(route('product.detail',$id));
    }
    function search(Request $request)
    {//search product

        $categories=tbl_product_cat::all();
        $list_bestsellings=tbl_product::where('best_selling','=','1')->get();


        $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
        //echo $keyword;
        $products = tbl_product::where('product_name', 'LIKE', "%{$keyword}%")->get();
        return view('product.search', compact('products','keyword','categories','list_bestsellings'));
    }
    
    function manual(){
        return view('product.manual');
    }
}
