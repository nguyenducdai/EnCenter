<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamNhan extends Model
{
    protected $table='camnhan';
     protected $fillable = [
        'idHocVien', 'Noidung'
    ];
}
