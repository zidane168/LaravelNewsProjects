
@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>{{$theloai->Ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                
                   @if (count($errors) > 0) 
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


                <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Tên Thể Loại</label>                        
                        <input class="form-control" name="Ten" placeholder="Tên Thể Loại" value="{{$theloai->Ten}}">
                        
                    </div>
                  
                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
