<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class tbl_page extends Model
{
    use SoftDeletes;
    //
     /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'page_title',
    'page_desc',
    'page_content',
    'page_img' ,
    'user_id' ,
  ];
}
