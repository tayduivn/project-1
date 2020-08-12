<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_list_customer extends Model
{
    //
     /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'fullname',	'phone_number',	'email','address',	'order_id',
  ];
}
