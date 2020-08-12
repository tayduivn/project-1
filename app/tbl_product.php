<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_product extends Model
{
  //
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'product_name', 'product_code', 'price_old',  'price_new', 'product_desc', 'product_content', 'product_thumb', 'product_qty', 'cat_id', 'status_product',
  ];

  function tblproductcat()//model 
  { //quan hệ 1 nhiều
     return $this->hasOne('App\tbl_product_cat','id','cat_id');
    // return $this->belongsTo('App\tbl_product_cat');
  }
}
