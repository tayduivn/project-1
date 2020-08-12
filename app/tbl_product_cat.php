<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class tbl_product_cat extends Model
{
    //
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'cat_title','updated_at', 'created_at',//có mỗi vầy thôi anh. Ý anh hỏi cái model này nó quản lý bảng nào tbl_product_cat
    ];
    function tblproduct(){//quan hệ 1 nhiều//model danh mục
        return $this->hasMany('App\tbl_product','cat_id');
        //return $this->hasMany('App\tbl_product');
    }
}
