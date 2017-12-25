
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



                 @if (count($errors) > 0)   
                    <div class ="alert alert-danger">
                          @foreach ($errors->all() as $err)      
                             {{$err}} <br>
                          @endforeach
                    </div>
                 @endif

                 @if (session('thongbao'))
                    <div class="alert alert-success">   
                        {{session('thongbao')}}
                    </div>
                 @endif




                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data"> <!-- phải có 'enctype="multipart/form-data"' mới có thể upload hình dc -->





                    <input type="hidden" name="_token" value="{{csrf_token()}}">

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
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="txtTieuDe" placeholder="Tiêu Đề" />
                    </div>

                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea id="TomTat" ame="txtTomTat"  rows="5" class="form-control ckeditor"></textarea>    
                    </div>

                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="NoiDung" name="txtNoiDung" rows="5" class="form-control ckeditor"></textarea>        
                    </div>

                 
                    <div class="form-group">
                        <label> Hình Ảnh </label>
                        <input type="file" name="Hinh" class="form-control"/>
                    </div>


                    <div class="form-group">
                        <label> Nổi Bật </label>
                        <label class="radio-inline">
                            
                            <input name="txtNoiBat" value="0" checked="" type="radio"/>    Không
                        </label>

                         <label class="radio-inline">                            
                            <input name="txtNoiBat" value="1"  type="radio"/>   Có
                        </label>
                        
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


