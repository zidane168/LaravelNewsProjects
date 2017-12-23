<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "TheLoai";

    // tao foreign key and primary key
    // trong the loai co bao nhieu loai tin va tin gi

    public function loaitin()
    {
        // mot the loai co nhieu laoi tin
    	return $this->hasMany('App\LoaiTin', 'idTheLoai', 'id');
    } 

    // trong tin tuc co bao nhieu loai tin gi
    public function tintuc()
    {
    	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
