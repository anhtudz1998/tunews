@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Sửa tin tức</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{asset('admin/tintuc/edit/'.$tintuc->id)}}" method="POST" enctype="multipart/form-data">
                            
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
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <select class="form-control" id="TheLoai" name="TheLoai">
                                   <option value="{{$tintuc->idTheLoai}}">{{$tintuc->TenTheLoai}}</option>
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên loại tin</label>
                                <select class="form-control" id="LoaiTin" name="LoaiTin">
                                        <option value="{{$tintuc->idLoaiTin}}">{{$tintuc->TenLoaiTin}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" placeholder="VD:Vợ chồng hạnh phúc" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input class="form-control" rows="3" name="TomTat" value="{{$tintuc->TomTat}}" placeholder="VD:Hi hi" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="ckeditor" rows="5"  value="" name="NoiDung">{{$tintuc->NoiDung}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="Hinh"  value="{{$tintuc->Hinh}}" >
                                <img style="max-height: 100px;" src="../upload/tintuc/{{$tintuc->Hinh}}">
                            </div>

                            
                            <div class="form-group">
                                @if(session('loi'))
                                    <div class="alert alert-danger">{{session('loi')}}</div>
                                @endif  
                                <label>Category Status</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" checked="" type="radio">Nổi bật
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa tin tức</button>
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
@section('script')
    
@endsection