
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
            

                <!-- Print Error -->  
              @if (count($errors) > 0)          <!-- bien la $$$$$$$$$$ -->
                    <div class="alert alert-danger">
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

                

                <form action="admin/loaitin/them" method="POST">    <!-- pass to LoaiTinController AddPost-->

                    <input type="hidden" name = "_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Thể Loại</label>                         
                        

                        <select class="form-control" name="cmbTheLoai">
                            <option value="0">Chọn</option>

                            @foreach ($theloai as $tl)   
                                <option value="{{$tl->id}}"> {{$tl->Ten}} </option>
                            @endforeach

                        </select>


                        

                    </div>
                    <div class="form-group">
                        <label>Tên Tin Tức</label>
                        <input class="form-control" name="txtTen" placeholder="Nhập Tên Tin Tức" />
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