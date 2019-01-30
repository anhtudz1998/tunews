
@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        <form action="../admin/loaitin/add" method="POST">
                            @if(count($errors)>0)
                                @foreach($errors->all() as $err)
                                    <div class="alert alert-danger">{{$err}}</div>
                                @endforeach
                            @endif
                            @if(Session('thongbao'))
                                <div class="alert alert-success">{{Session('thongbao')}}</div>
                            @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên loại tin</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name" />
                            </div>
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-default">Thêm loại tin</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection