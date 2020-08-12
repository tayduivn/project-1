<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;


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

class CustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $status = 'trash';
        $fullname = $request->input('fullname');
        $address = $request->input('address');
        $phone_number = $request->input('phone');
        $email = $request->input('email');
        if($request->input('payment-method')=='direct-payment'){
            $ship_info='Thanh toán tại cửa hàng';
        }elseif($request->input('payment-method')=='payment-home'){
            $ship_info='Thanh toán tại nhà';
        }
        $datetime= date('\N\g\à\y d-m-Y',time());//lấy ngày hiện tại
        $datetimes= date('\N\g\à\y d-m-Y',time()+24*3600*3);//lấy 3 ngày tiép theo
        
        $datetimess= date('\N\g\à\y d-m-Y H:i:s',time());
            
        
        $info_orders=tbl_list_order::where('id','=',session('id_order'))->first();
    
        return $this->view('mail.customermail', compact('fullname', 'email', 'address', 'phone_number', 'ship_info', 'status', 'info_orders','datetime','datetimes','datetimess'))
            ->from('letrunghunter9999@gmail.com', 'Unimart')
            ->subject('[Unimart] Thư xác nhận quý khách đặt hàng thành công'); //tên view có nội dung muốn gửi qua
    }
}
