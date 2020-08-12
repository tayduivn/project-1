<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_comment_product extends Model
{
    //
     /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'email','name','comment','com_id'
  ];
}
