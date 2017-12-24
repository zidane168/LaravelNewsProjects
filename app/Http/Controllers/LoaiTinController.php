<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;	// if u make the bug when bao ko tim thay file, maybe your file not right format (UTF8)

class LoaiTinController extends Controller
{
    //
    public function Get()
    {
    	$loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
    }

    public function Delete($id)
    {
    	$loaitin = LoaiTin::find($id);
    	$loaitin->delete();
    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xóa Thành Công');	// đẩy msg ra ngoài
    }
}
