<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;	// if u make the bug when bao ko tim thay file, maybe your file not right format (UTF8)
use App\TheLoai;

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

    public function Add()
    {
    	$theloai = TheLoai::all();
    	return view('admin.loaitin.them', ['theloai' => $theloai]);    	
    }

    public function AddPost(Request $request)
    {
    	// validate from form pass to here

    	// $this->validate($request, bug, thongb_bao-man-hinh);
		$this->validate($request, 
			[
				'txtTen' => 'required|min:1|max:100', /// Ten pass from FORM GUI admin.loaitin.them
				'cmbTheLoai' => 'required'

			], 
			[
				'txtTen.required' =>'Bạn chưa nhập tên Loại Tin',				
// 				'txtTen.unique' =>'Tên Loại Tin đã tồn tại',
				'txtTen.min'=>'Tên Thể Loại phải có độ dài từ 3 cho đến 100 ký tự',
				'txtTen.max'=>'Tên Thể Loại phải có độ dài từ 3 cho đến 100 ký tự',
				'cmbTheLoai.required' => 'Bạn chưa chọn Thể Loại',
			]);

		$loaitin = new LoaiTin;
		$loaitin->Ten = $request->txtTen;
		$loaitin->TenKhongDau = changeTitle($request->txtTen); // dùng thư viện bên ngoài
		$loaitin->idTheLoai = $request->cmbTheLoai;

        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao', 'Thêm thành công');
//         echo changeTitle($request->Ten);
    	// echo $request->Ten;
    }
}
