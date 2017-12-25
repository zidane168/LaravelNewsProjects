<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;

class TinTucController extends Controller
{
    //

    public function Get()
    {
    	$tintuc = TinTuc::orderby('id', "DESC")->get();	// dấu "" mới đúng cho DESC
    	return view('admin/tintuc/danhsach', ['tintuc' => $tintuc]);
    }
}
