 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDAMAN</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{url('assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('assets/plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/main-style.css')}}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{url('assets/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />

    

    <!-- Page-Level CSS -->
    <link href="{{url('assets/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
               
               
               

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li><li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="{{url('assets/img/user.jpg')}}" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong>{{Auth::user()->name}}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                  <!--       <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    -->     <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                      @if (Auth::user()->permession=='Hrd'||Auth::user()->permession=='Admin')
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Pegawai<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('pegawai')}}">Tabel Pegawai</a>
                            </li>
                            <li>
                                <a href="{{url('pegawai/create')}}">Tambah Data</a>
                            </li>

                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                      @elseif (Auth::user()->permession=='Hrd')
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Kategori Lembur<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('kategori_lembur')}}">Tabel Kategori_lembur</a>
                            </li>
                            <li>
                                <a href="{{url('kategori_lembur/create')}}">Tambah Data</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Lembur Pegawai<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('lembur_pegawai')}}">Tabel lembur pegawai</a>
                            </li>
                            <li>
                                <a href="{{url('lembur_pegawai/create')}}">Tambah Data</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>tunjangan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('tunjangan')}}">Tabel Tunjangan</a>
                            </li>
                            <li>
                                <a href="{{url('tunjangan/create')}}">Tambah Data</a>
                            </li>
                    @endif
                    
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Jabatan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('jabatan')}}">Tabel Jabatan</a>
                            </li>
                            <li>
                                <a href="{{url('jabatan/create')}}">Tambah Data</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Golongan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('golongan')}}">Tabel Golongan</a>
                            </li>
                            <li>
                                <a href="{{url('golongan/create')}}">Tambah Data</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        
    <!-- end wrapper -->
 @yield('content');
    <!-- Core Scripts - Include with every page -->
    <script src="{{url('assets/plugins/jquery-1.10.2.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('assets/plugins/pace/pace.js')}}"></script>
    <script src="{{url('assets/scripts/siminta.js')}}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{url('assets/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{url('assets/plugins/morris/morris.js')}}"></script>
    <script src="{{url('assets/scripts/dashboard-demo.js')}}"></script>


    <!-- Page-Level Plugin Scripts-->
    <script src="{{url('assets/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{url('assets/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
