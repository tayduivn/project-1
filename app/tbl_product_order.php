<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_product_order extends Model
{
    //
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'order_id',	'thumb_product','price'	,'qty',	'sub_total','product_name',
  ];
}
