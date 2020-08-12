<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_info_order extends Model
{
    //
     /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'order_id',	'order_code',	'address',	'ship_info',	'order_status',	'note'
  ];
}
