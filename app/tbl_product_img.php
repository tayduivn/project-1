<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_product_img extends Model
{
    //
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','product_img','updated_at', 'created_at',//có mỗi vầy thôi anh. Ý anh hỏi cái model này nó quản lý bảng nào tbl_product_cat
     ];
}
