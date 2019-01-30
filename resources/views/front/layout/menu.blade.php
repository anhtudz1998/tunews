<ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>
                    @foreach($theloai as $tl)
                    
                        <li href="#" class="list-group-item menu1">
                            {{$tl->Ten}}
                        </li>
                        <ul>
                            @foreach($tl->loaitin as $lt)
                                <li class="list-group-item">
                                    <a href="category/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a>
                                </li>
                            @endforeach
                        </ul>
                   
                    @endforeach
                </ul>