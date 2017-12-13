<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dimento | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/libs/admin/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/libs/admin/Ionicons/css/ionicons.min.css">
    {{--table--}}
    <link rel="stylesheet" href="/libs/admin/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="libs/admin/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/libs/admin/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/libs/admin/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/libs/adminjquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/libs/admin/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/libs/admin/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/libs/admin/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
    .skin-black {
        color: black;
        background-color: black;
    }
</style>
<body class=" skin-black sidebar-mini">
<div class="wrapper">

    <header class="main-header ">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Dimento</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">


                        <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ auth()->user()->profile_pic != null ? auth()->user()->profile_pic: '/img/avatar.png'}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{auth()->user()->first_name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ auth()->user()->profile_pic != null ? auth()->user()->profile_pic: '/img/avatar.png'}}" class="img-circle" alt="image">
                                <p>Administrator</p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/user/{{ Auth::user()->id}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class=" treeview">
                    <a href="#dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            </span>
                    </a>
                    <ul class="treeview-menu">

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Table Data</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#objects"><i class="fa fa-circle-o"></i>Objects</a></li>
                        <li><a href="#users"><i class="fa fa-circle-o"></i>Users</a></li>
                        <li><a href="#users"><i class="fa fa-circle-o"></i>Posts</a></li>
                        <li><a href="#users"><i class="fa fa-circle-o"></i>Tasks</a></li>
                        <li><a href="#ads"><i class="fa fa-circle-o"></i>Advertisements</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Dashboard</h1>

        </section>

        <!-- Main content -->
        <section class="content" id="dashboard">

        @yield('content')

        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count($objects) }}</h3>
                            <p>Total Objects</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#objects" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2  ">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ count($users) }}</h3>
                            <p>Users Registered</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-2 ">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ count($posts) }}</h3>
                            <p>Total Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#forum-posts" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-2  ">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{ count($tasks) }}</h3>
                            <p>Total Tasks</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-plus-round"></i>
                        </div>
                        <a href="#tasks" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-2 ">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ count($advertisements) }}</h3>
                            <p>Total Ads</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#ads" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

        {{--objects list table--}}
        <div class="box" id="objects">
            <div class="box-header">
                <h3 class="box-title">Objects</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="objects-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Posted By</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($objects as $object)
                        <tr>
                            <td>{{ $object->title }}</td>
                            <td>{{ $object->category }}</td>
                            <td>{{ $object->description }}</td>
                            <td>{{ $object->user->first_name }}</td>
                            <td class="left">
                                <a href="{{ route('object.show', $object->id) }}" target="_blank"><i class="fa fa-eye"
                                                                                                     aria-hidden="true">
                                        View</i></a><br>
<<<<<<< HEAD
                                <a href="{{ route('object.destroy', $object->id) }}"
                                   onclick="event.preventDefault();if(confirm('Are you sure that you want to delete this? Once you delete this, all data associated with this would also be deleted.')){document.getElementById('delete-object-form-of-{{ $object->id }}').submit();}">
                                    <i class="fa fa-trash-o" aria-hidden="true">
                                        Remove</i><br></a>

                                <form id="delete-object-form-of-{{ $object->id }}"
                                      action="{{ route('object.destroy', [$object->id]) }}"
                                      method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
=======
                                <a href="{{ route('object.destroy', $object->id) }}" ><i class="fa fa-trash-o"
                                                                                        aria-hidden="true">
                                        Remove</i><br></a>
>>>>>>> bd01b0bb4493117da55bbb3012bd171123371a0c
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Posted By</th>
                        <th>Edit</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        {{--registered users table--}}
        <div class="box" id="users">
            <div class="box-header">
                <h3 class="box-title">Registered Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="user-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type == 1?'Designer':($user->type == 2?'Individual Customer':($user->type == 3?'Business Organization':'Admin')) }}</td>
                            <td>{{ $user->phone }}</td>
                            <td class="left">
                                <a href="{{ route('user.show', $user->id) }}" target="_blank"><i class="fa fa-eye"
                                                                                                 aria-hidden="true">
                                        View</i></a><br>
                                <a href="{{ route('user.destroy', $user->id) }}"><i class="fa fa-trash-o"
                                                                                    aria-hidden="true">
                                        Remove</i><br></a>
                                {{--<a href="/admin/make_admin" data-id="{{ $user->id }}"--}}
                                   {{--class="{{ $user->isAdmin()?'remove-admin':'make-admin' }} user-admin"><i--}}
                                            {{--class="fa fa-link"--}}
                                            {{--aria-hidden="true"> {{ $user->isAdmin()?'Remove Admin':'Make Admin' }}</i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Edit</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <br>

        {{-- total posts table--}}
        <div class="box" id="forum-posts">
            <div class="box-header">
                <h3 class="box-title">Forum Posts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="forum-post-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>View Count</th>
                        <th>Published on</th>
                        <th>Published by</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category}}</td>
                            <td>{{$post->view_count}}</td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y M d g:i A')}}</td>
                            <td>{{$post->user->first_name.' '.$post->user->last_name}}</td>
                            <td class="left">
                                <a href="{{ route('post.show', $post->id) }}" target="_blank"><i class="fa fa-eye"
                                                                                                 aria-hidden="true">
                                        View</i></a><br>
                                <a href="{{ route('post.destroy', $post->id) }}"><i class="fa fa-trash-o"
                                                                                    aria-hidden="true">
                                        Remove</i></a><br>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>View Count</th>
                        <th>Published on</th>
                        <th>Published by</th>
                        <th>Edit</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <br>

        {{-- total tasks table--}}
        <div class="box" id="tasks">
            <div class="box-header">
                <h3 class="box-title">Posted Tasks</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="task-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Is accepted?</th>
                        <th>Published on</th>
                        <th>Published by</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->deadline}}</td>
                            <td>{{$task->freelancer_id==null? 'Open':'Allocated'}}</td>
                            <td>{{ \Carbon\Carbon::parse($task->created_at)->format('Y M d g:i A')}}</td>
                            <td>{{$task->user->first_name.' '.$task->user->last_name}}</td>
                            <td class="left">
                                <a href="{{ route('task.show', $task->id) }}" target="_blank"><i class="fa fa-eye"
                                                                                                 aria-hidden="true">
                                        View</i></a><br>
                                <a href="{{ route('task.destroy', $task->id) }}"><i class="fa fa-trash-o"
                                                                                    aria-hidden="true">
                                        Remove</i></a><br>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Is accepted?</th>
                        <th>Published on</th>
                        <th>Published by</th>
                        <th>Edit</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <br>

        {{--advertisements table--}}
        <div class="box" id="ads">
            <div class="box-header">
                <h3 class="box-title">Advertisements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="ad-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Views</th>
                        <th>Published on</th>
                        <th>Published by</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($advertisements as $ad)
                        <tr>
                            <td>{{ $ad->title }}</td>
                            <td>{{ $ad->description }}</td>
                            <td>{{ $ad->views }}</td>
                            <td>{{ \Carbon\Carbon::parse($ad->created_at)->format('Y M d g:i A')}}</td>
                            <td>{{ $ad->user->first_name.' '.$ad->user->last_name }}</td>
                            <td class="left">
                                <a href="{{ route('advertisement.show', $ad->id) }}" target="_blank"><i
                                            class="fa fa-eye" aria-hidden="true"> View</i></a><br>
                                @if($ad->accepted == 0)
                                    <a href="{{ route('advertisement.update', $ad->id) }}" target="_blank"><i
                                                class="fa fa-check" aria-hidden="true"> Accept</i></a><br>
                                @endif
                                <a href="{{ route('advertisement.destroy', $ad->id) }}"><i class="fa fa-trash-o"
                                                                                           aria-hidden="true">
                                        Remove</i></a><br>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Views</th>
                        <th>Published on</th>
                        <th>Published by</th>
                        <th>Edit</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <br>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">

        <strong>Copyright &copy; 2017 <a href="/">DbTraps</a></strong>
    </footer>


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/libs/admin/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/libs/admin/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/libs/admin/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/libs/admin/raphael.min.js"></script>
<script src="/libs/admin/morris.min.js"></script>
{{--table--}}
<script src="/libs/admin/jquery.dataTables.min.js"></script>
<script src="/libs/admin/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="/libs/admin/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/libs/admin/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/libs/admin/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/libs/admin/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/libs/admin/moment.min.js"></script>
<script src="/libs/admin/daterangepicker.js"></script>
<!-- datepicker -->
{{--<script src="libs/admin/bootstrap-datepicker.min.js"></script>--}}
<!-- Bootstrap WYSIHTML5 -->
<script src="/libs/admin/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/libs/admin/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/libs/admin/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/libs/admin/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/libs/admin/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/libs/admin/demo.js"></script>
<script>
    $(function () {

        $('.user-admin').click(function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');

            $.ajax({
                url: '/admin/make_admin',
                method: 'POST',
                data: {'user_id': id},
                success: function (returnData) {
                    console.log(returnData);
                },
                error: function (returnData) {
                    console.log(returnData);
                }
            });
        });

        $('#objects-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        })
        $('#user-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        })
        $('#forum-post-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        })
        $('#task-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        })
        $('#ad-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        })
    })
</script>
</body>
</html>
