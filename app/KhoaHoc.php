<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
  	 protected $table='khoahoc';
     protected $fillable = [
        'title', 'descaption', 'content','price','image','sohocvien','status'
    ];
}
