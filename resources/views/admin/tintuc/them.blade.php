
@extends('admin.layout.index')

@section('content') <!-- đổ dữ liệu vào chỗ content trong trang index   @yield('content')--> 

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="cmbTheLoai" id="TheLoai">
                            <option value="0">Chọn</option>

                            @foreach ($theloai as $tl)    

                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>

                            @endforeach
                        </select>
                    </div>


                     <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" name="cmbLoaiTin" id="LoaiTin">
                            <option value="0">Chọn</option>

                            @foreach ($loaitin as $lt)

                            <option value="{{$lt->id}}">{{$lt->Ten}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                    </div>
                   
                    <button type="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection


@section('script')
    <script> 
        $(document).ready(function(){
            // alert ('running!');

            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                //alert(idTheLoai);

                $.get("admin/ajax/loaitin/" + idTheLoai , function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });

    </script>
@endsection


