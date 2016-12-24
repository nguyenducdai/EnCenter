<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hocvien extends Model
{
    protected $table='hocvien';
     protected $fillable = [
        'name', 'email', 'address','phone','date','job','note','idKhoahoc'
    ];
}
