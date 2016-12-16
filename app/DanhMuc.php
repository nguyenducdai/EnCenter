<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
	protected $table='danhmuc';
     protected $fillable = [
        'name', 'Descation', 'parent_id',
    ];

}
