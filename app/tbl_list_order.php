<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_list_order extends Model
{
    //
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'order_code','fullname','order_number','total_price','status'
  ];
}
