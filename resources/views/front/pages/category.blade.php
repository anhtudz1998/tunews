@extends('front.layout.master')
@section('content')
<div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$loaitin->Ten}}</b></h4>
                    </div>

                    <div class="row-item row">
                        @foreach($loaitin->tintuc as $tintuc)
                        <div class="col-md-3">

                            <a href="detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            
                            <h3>{{$tintuc->TieuDe}}</h3>
                            <p>{{$tintuc->TomTat}}</p>
                            <a class="btn btn-primary" href="detail/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                            @endforeach

                    </div>

                    
                    

                </div>
            </div>
@endsection