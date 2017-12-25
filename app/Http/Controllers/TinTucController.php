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

    public function Add()
    {
    	$loaitin = LoaiTin::all();
    	$theloai = TheLoai::all();
    	return view('admin/tintuc/them', ['loaitin' => $loaitin, 'theloai' => $theloai]);
    }

    public function AddPost(Request $request)
    {
    	$this->validate($request, 
    		[
    			'cmbLoaiTin' => 'required',
    			'txtTieuDe' => 'required|min:3|unique:TinTuc, TieuDe',
    			'txtTomTat' => 'required',
    			'txtNoiDung' => 'required'
    		],

    		[
    			'cmbLoaiTin.required' => 'bạn chưa chọn loai tin',
    			'txtTieuDe.required' => 'Bạn chưa nhập tiêu đề',
    			'txtTieuDe.min' => 'Tiêu để có ít nhất 3 ký tự',
    			'txtTieuDe.unique' => 'Tiêu Để đã tồn tại',
    			'txtTomTat.required' => 'Bạn chưa nhập tóm tắt',
    			'txtNoiDung.required' => 'Bạn chưa nhập nội dung!'
    		]
    	)
    }
}
