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
    			'txtTieuDe' => 'required|min:3',
    			'txtTomTat' => 'required',
    			'txtNoiDung' => 'required'
    		],

    		[
    			'cmbLoaiTin.required' => 'bạn chưa chọn loai tin',
    			'txtTieuDe.required' => 'Bạn chưa nhập tiêu đề',
    			'txtTieuDe.min' => 'Tiêu để có ít nhất 3 ký tự',
    			// 'txtTieuDe.unique' => 'Tiêu Để đã tồn tại',
    			'txtTomTat.required' => 'Bạn chưa nhập tóm tắt',
    			'txtNoiDung.required' => 'Bạn chưa nhập nội dung!'
    		]);


    	$tintuc = new TinTuc;
    	$tintuc->TieuDe = $request->txtTieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->txtTieuDe);
    	$tintuc->idLoaiTin = $request->cmbLoaiTin;
    	$tintuc->TomTat = $request->txtTomTat;
    	$tintuc->NoiDung = $request->txtNoiDung;
    	$tintuc->SoLuotXem = 0;

    	if ($request->hasFile('Hinh'))
    	{
    		$file = $request->file('Hinh');

    		// cho phep upload với duoi cho phép
    		$duoi = $file->getClientOriginalExtension();

    		if ($duoi != 'jpg' && $duoi != "png") 
    		{
    			return redirect('admin/tintuc/them')->with('thongbao', 'just accept png or jpg');
    		}

    		// truong hop hinh tồn tại tên
    		$name = $file->getClientOriginalName();
    		$Hinh = str_random(4) . "_" . $name;

    		// echo $Hinh;

			while (file_exists("upload/tintuc/" . $Hinh))
			{
				$Hinh = str_random(4) . "_" . $name;
			}

			$file->move('upload/tintuc', $Hinh);	// lưu hình
			$tintuc->Hinh  = $Hinh;
    	}
    	else
    	{
    		$tintuc->Hinh = "";
    	}

    	$tintuc->save();

    	return redirect('admin/tintuc/them')->with('thongbao', 'Add News succeefully!');
    }
}
