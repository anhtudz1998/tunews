@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{asset('admin/slide/edit/'.$slide->id)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $er)
                                    {{$er}}
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success">{{session('thongbao')}}</div>
                            @endif 
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" value="{{$slide->Ten}}" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="NoiDung" value="{{$slide->NoiDung}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <br>
                                <img style="max-width: 200px" src="../upload/slide/{{$slide->Hinh}}">
                                <input type="file" name="Hinh" value="{{$slide->Hinh}}" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" value="{{$slide->link}}" />
                            </div>


                            <button type="submit" class="btn btn-default">Sửa Slide</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection