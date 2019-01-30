 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{asset('/homeadmin')}}"><i class="fa fa-dashboard fa-fw"></i> Bảng điều khiển</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thể loại <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/theloai/list')}}"> Danh sách </a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/theloai/add')}}"> Thêm thể loại </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-dragon"></i> Loại tin <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/loaitin/list')}}"> Danh sách </a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/loaitin/add')}}"> Thêm loại tin </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-ambulance"></i> Tin tức <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/tintuc/list')}}"> Danh sách </a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/tintuc/add')}}"> Thêm tin tức </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-apple"></i> Slide <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/slide/list')}}"> Danh sách </a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/slide/add')}}"> Thêm Slide </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/user/list')}}"> Danh sách </a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/user/add')}}"> Thêm User </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                       
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>