<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laravel Khoa Pham</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    @include('front.layout.header')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="category/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->TenKhongDau}}.html">{{$tintuc->loaitin->Ten}}</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Tải lên {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!!$tintuc->NoiDung!!}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::user())
                <div class="well">
                    @if(session('thongbao'))
                            <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="comment/{{$tintuc->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                        {{csrf_field()}}
                    </form>
                </div>
                @endif
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @if(session('thongbao2'))
                            <div class="alert alert-success">{{session('thongbao2')}}</div>
                @endif
                @foreach($tintuc->comment as $comment)
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        {{$comment->NoiDung}}
                        <a style="float: right;" href="detail/comment/delete/{{$comment->id}}/{{$comment->idTinTuc}}">Xóa</a>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tinlienquan)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail/{{$tinlienquan->id}}/{{$tinlienquan->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tinlienquan->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="detail/{{$tinlienquan->id}}/{{$tinlienquan->TieuDeKhongDau}}.html"><b>{{$tinlienquan->TieuDe}}</b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinnoibat as $tinnoibat)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail/{{$tinnoibat->id}}/{{$tinnoibat->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tinnoibat->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="detail/{{$tinnoibat->id}}/{{$tinnoibat->TieuDeKhongDau}}.html"><b>{{$tinnoibat->TieuDe}}</b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    @include('front.layout.footer')
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>

</body>

</html>
