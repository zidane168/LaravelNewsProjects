<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //

    protected $table = "LoaiTin";

    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');

    }

    // trong loai tin co bao nhieu tin
    public function tintuc()
    {
    	// loai tin co nhieu tin tuc, hasMany
    	return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
    }
}
