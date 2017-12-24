<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;


class LoaiTinController extends Controller
{
    //

    public function Get()
    {
    	$loaitin  = LoaiTin::all();
    	return view('admin.loaitin.danhsach', ['loaitin'=>$loaitin]);
    }

   /* public function Update($id)
    {
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua', ['loaitin'=>$loaitin]);

    }

    public function UpdatePost(Request $request, $id)
    {
        $theloai = TheLoai::find($id);


        // validate bien sửa
        $this->validate($request, 
                // dieu kien check loi
            [
                'Ten' => 'required|unique:TheLoai,Ten|min:3|max:100'
            ],  // thong bao
            [
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.unique' => 'Tên thể loại đã tồn tại',
                'Ten.min' => 'min 3 ky tự',
                'Ten.max' => 'max 100 ky tu'
            ]
        );

        // gán nó qua tên mới
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('thong bao', 'Sửa Thành Công');

    }
    */

    /*public function Add()
    {
    	return view('admin.loaitin.them');
    }


    public function AddPost(Request $request )	// post
    {

		// $this->validate($request, bug, thongb_bao-man-hinh);
		$this->validate($request, 
			[
				'Ten' => 'required|min:3|max:100'
			], 
			[
				'Ten.required' =>'Bạn chưa nhập tên Thẻ Loại',
				'Ten.min'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
				'Ten.max'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
			]);

		$theloai = new TheLoai;
		$theloai->Ten = $request->Ten;
		$theloai->TenKhongDau = changeTitle($request->Ten); // dùng thư viện bên ngoài

        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công');
//         echo changeTitle($request->Ten);
    	// echo $request->Ten;
    }
*/

    public function Delete($id)
    {
        $theloai = LoaiTin::find($id);
        $theloai->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xóa thành công!');
    }
}
