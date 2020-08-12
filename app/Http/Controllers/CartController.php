<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use App\Mail\CustomerMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\tbl_product_cat;
use App\tbl_product;
use App\tbl_product_img;
use App\tbl_page;
use App\User;
use App\tbl_list_order;
use App\tbl_info_order;
use App\tbl_list_customer;
use App\tbl_product_order;
class CartController extends Controller
{
    //
    function show(){
       
        return view('cart.show');
    }
    
    function add(Request $request,$id){
       
         $product=tbl_product::find($id);//tìm id để thêm vào giỏ hàng
        // return $product;
         Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name, 
                    'qty' => 1, 
                    'price' => $product->price_new, 
                    'options' => ['product_thumb' => $product->product_thumb,'product_code'=>$product->product_code ],
                  
                  ]);
       
         return redirect('cart/show');//thêm xong thì trở về trang giỏ hàng
     }

   

     function remove($rowId){
         Cart::remove($rowId);
         return redirect('cart/show');
     }
     function destroy(){
         Cart::destroy();
         return redirect('cart/show');
     }
     function update(Request $request){//cập nhật giỏ hàng

       //  dd($request->all());
         $data=$request->get('qty');
         foreach($data as $k=>$v){
             Cart::update($k,$v);
         }
        return redirect('cart/show');
     }
     
    //  function updateajax(Request $request){
       
    //      $product_id=$request->input('product_id');//đặt biến lấy giá trị product_id
    //      $num_order = $request->input('qty');//đặt biến lấy giá trị num-order(số lượng)
        
        
        
         

    //     //  $product_id = $_POST['product_id']; //đặt biến lấy giá trị product_id
    //     //  $num_order = $_POST['num_order']; //đặt biến lấy giá trị num-order(số lượng)
    //     //  $price = $_SESSION['cart']['buy'][$product_id]['product_price']; //cap nhat lai giá
    //     //  $sub_total = $price * $num_order; //tổng giá từng sản phẩm bằng vs giá . số lượng mới
    //     //  //Câp nhật mang [cart][buy]
    //     //  $_SESSION['cart']['buy'][$product_id]['qty'] = $num_order; //cập nhật lại số lượng mới
    //     //  $_SESSION['cart']['buy'][$product_id]['sub_total'] = $sub_total; //cập nhật lại tổng tiền
    //     //  update_info_cat(); //cập nhật thông tin mảng
    //     //  //Lấy tổng tiền
    //     //  $total = $_SESSION['cart']['info']['total']; //cập nhật thông tin thành tiền từng sản phẩm
    //     //  $num_order_cart = $_SESSION['cart']['info']['num_order']; //cập nhật so lượng các sản phẩm
    //     //  $result = array(
    //     //      'sub_total' => currency_format($sub_total),
    //     //      'total' => currency_format($total),
    //     //      'num_order_cart' => $num_order_cart,
    //     //  );
    //     //  echo json_encode($result);


    //  }


     function checkout(Request $request){//gọi view checkout
        
         return view('cart.checkout');
     }
     function addcustomer(Request $request)
    {

        $request->validate(
            [
                'fullname' => ['required', 'string'],
                'email' => ['required', 'string'],
                'address' => ['required', 'string'],
                'phone' =>  ['required', 'string'],
                'note' =>  ['required', 'string'],
                'payment-method' => ['required', 'string'],
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'fullname' => 'Họ và tên',
                'email' => 'Email',
                'address' => 'Địa chỉ',
                'phone' =>  'Số điện thoại',
                'note' =>  'Ghi chú',
                'payment-method' => 'Hình thức thanh toán',

            ]

        );
       $code="#UNI".rand(1,1000000);

        session(['id_order' =>$code]);//lấy code để chuyển sang mail
 
   
       $qty=Cart::count();
       
       $carts=Cart::content();

       $price=Cart::total();
       $total_price=str_replace(".","",$price);//loại bỏ ký tự,
      
       $status='trash';
       $fullname=$request->input('fullname');
       $address=$request->input('address');
       $phone_number=$request->input('phone');
       $email=$request->input('email');
     //  $ship_info=$request->input('payment-method');

       if($request->input('payment-method')=='direct-payment'){
           $ship_info='Thanh toán tại cửa hàng';
       }elseif($request->input('payment-method')=='payment-home'){
           $ship_info='Thanh toán tại nhà';
       }

       
       $note=$request->input('note');
        $new_id= tbl_list_order::create([
            'order_code'=>$code,
            'fullname'=>$fullname,
            'order_number'=>$qty,
            'total_price'=> $total_price,
            'status'=>$status,

         ]);//add vào bảng tbl_list_orders
        
        tbl_info_order::create([
            'order_id'=>$new_id->id,
            'order_code'=>$code,
            'address'=>$address,
            'ship_info'=> $ship_info,
            'order_status'=>$status,
            'note'=>$note,

        ]);//add vào bảng tbl_info_orders

        tbl_list_customer::create([
            'fullname'=>$fullname,
            'phone_number'=>$phone_number,
            'email'=>$email,
            'address'=> $address,
            'order_id'=>$new_id->id,
            

        ]);//add vào bảng tbl_list_customers
        foreach($carts as $cart){
            tbl_product_order::create([
                'order_id'=>$new_id->id,
                'thumb_product'=>$cart->options->product_thumb,
                'price'=>$cart->price,
                'qty'=> $cart->qty,
                'sub_total'=>$cart->total,
                'product_name'=>$cart->name,
            ]);//add vào bảng tbl_products_orders
        }
        
        
        Mail::to($email)->send(new CustomerMail);//gửi mail đến khách hàng
        
        return redirect(route('cart.thank',$new_id->id))->with('status', 'Email đã được gửi cho quý khách '.$fullname.' với đơn hàng: '.$code.'. Quý khách vui lòng mở mail để xem chi tiết đơn hàng!');
         
    }

    function addcheckout(Request $request,$id){//add số lượng ở mua ngay
       
         $product=tbl_product::find($id);//tìm id để thêm vào giỏ hàng
        // return $product;
         Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name, 
                    'qty' => 1, 
                    'price' => $product->price_new, 
                    'options' => ['product_thumb' => $product->product_thumb,'product_code'=>$product->product_code ],
                  
                  ]);
         return redirect('cart/checkout');//thêm xong thì trở về trang giỏ hàng
     }

     function addcartmulti(Request $request,$id){//add số lượng ở mua ngay
        
         $product=tbl_product::find($id);//tìm id để thêm vào giỏ hàng
       
         Cart::add([
                    'id' => $product->id,
                    'name' => $product->product_name, 
                    'qty' => $request->input('num-order'), 
                    'price' => $product->price_new, 
                    'options' => ['product_thumb' => $product->product_thumb,'product_code'=>$product->product_code ],
                  
                  ]);
       
        return redirect(route('product.detail',$product->id));//lấy số lượng ở input xong thì trả về trang cũ
     }
    
     function thank(Request $request,$id){//trang thank
       
        $datetime= date('\N\g\à\y d-m-Y',time());//lấy ngày hiện tại

        $info_orders=tbl_info_order::where('order_id','=',$id)->first();//lấy thông tin đơn hàng 
          // return $info_orders->order_code;
        if($info_orders->order_status=='private'){//đổi tên trạng thái
            $info_order='Đang xử lý';
        }elseif($info_orders->order_status=='public'){
            $info_order='Hoàn thành';
        }elseif($info_orders->order_status=='trash'){
            $info_order='Đang tiếp nhận';
        }
        $list_fullname=tbl_list_customer::where('order_id','=',$id)->first();//lấy thông tin tên khách hàng
      
        return view('cart.thank',compact('info_orders','list_fullname','datetime','info_order'));
     }
}
