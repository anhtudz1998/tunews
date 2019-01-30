@extends('front.layout.master')
@section('content')


<div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		@foreach($theloai as $tl)
					    <div class="row-item row">
		                	<h3>
		                		<a href="">{{$tl->Ten}}</a> | 	
		                		@foreach($tl->loaitin as $lt)
		                		<small><a href="category/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
		                		@endforeach
		                	</h3>
		                	<?php  
		                		$data= $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(4);
		                		$tin1= $data->shift();
		                	?>
		          
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="detail/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
			                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>{{$tin1['TieuDe']}}</h3>
			                        <p>{{$tin1['TomTat']}}</p>
			                        <a class="btn btn-primary" href="detail/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
		                    

							<div class="col-md-4">
								@foreach($data as $data)
			                        <div class="row" style="margin-top: 10px;">
			                            <div class="col-md-5">
			                                <a href="detail/{{$data->id}}/{{$data->TieuDeKhongDau}}.html">
			                                    <img class="img-responsive" src="upload/tintuc/{{$data->Hinh}}" alt="">
			                                </a>
			                            </div>
			                            <div class="col-md-7">
			                                <a href="detail/{{$data->id}}/{{$data->TieuDeKhongDau}}.html"><b>{{$data->TieuDe}}</b></a>
			                            </div>
			                            <div class="break"></div>
			                        </div>
			                        @endforeach
								
							</div>
							
							<div class="break"></div>
		                </div>
		                @endforeach
					</div>
	            </div>
        	</div>
@endsection