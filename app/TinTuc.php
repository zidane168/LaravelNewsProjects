<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table = "TinTuc";

	// mot tin tuc thuoc mot loai tin
    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin', 'idLoaiTin', 'id');
    }

    // lay comment
    // tin tuc co bao nhieu comment
    public function comment()
    {
    	// tin tuc co nhieu comment
    	return $this->hasMany('App\Comment', 'idTinTuc', 'id');
    }
}
