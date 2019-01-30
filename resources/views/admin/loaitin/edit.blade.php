@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
                            <small>{{$loaitin->Ten}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{asset('admin/loaitin/edit/'.$loaitin->id)}}" method="POST" >
                            @if(count($errors)>0)
                                @foreach($errors as $err)
                                <div class="alert alert-danger">{{$err}}</div>
                                @endforeach
                            @endif
                            @if(Session('thongbao'))
                                <div class="alert alert-success">{{Session('thongbao')}}</div>
                            @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label></label>
                                <select class="form-control" name="TheLoai">
                                    <option value="{{$loaitin->idTheLoai}}">{{$loaitin->TenTheLoai}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên loại tin</label>
                                <input class="form-control" name="Ten" value="{{$loaitin->Ten}}" placeholder="Please Enter Category Name" />
                            </div>
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-default">Sửa loại tin</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection