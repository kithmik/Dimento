{{--@extends('layouts.app')--}}
@include('includes.header')
@include('includes.navbar')

<div class="container" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-4">
            <!--Card-->
            <div class="card testimonial-card">

                <!--Bacground color-->
                <div class="card-up grey lighten-3">
                </div>

                <!--Avatar-->
                <div class="avatar"><img src="/img/avatar.png" class="rounded-circle">
                </div>

                <div class="card-body">
                    <!--Name-->
                    <h4 class="card-title">{{ $user->first_name.' '.$user->last_name}}</h4>
                    <hr>
                    <!--Quotation-->
                    <p class="text-lg-left">
                        <b>Type: </b> {{ $user->type == 1?'Designer':($user->type == 2?'Individual Customer':($user->type == 3?'Business Organization':'')) }}
                    </p>
                    <p class="text-lg-left"><b>Email: </b> {{ $user->email}}</p>
                    <p class="text-lg-left"><b>Date
                            Joined: </b>{{ \Carbon\Carbon::parse($user->created_at)->format('Y M d')}}</p>

                    @auth
                        @if(auth()->user()->id == $user->id)
                            <button href="#" class="btn btn-outline-elegant waves-effect btn-sm">Edit</button>
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm">Delete</button>
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm"
                                    data-toggle="modal" data-target="#more">More
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm"
                                    data-toggle="modal" data-target="#more">More
                            </button>
                            <button href="#" class="btn btn-outline-elegant waves-effect btn-sm">Follow</button>
                        @endif
                    @endauth
                </div>
            </div>
            <!--/.Card-->
        </div>
        <div class="col-md-8">
            <div class="card" style="height: 500px">
                @auth
                    @if($user->type == 1)
                        {{--check whether designer--}}
                        {{--objects list table--}}
                        <div class="box" id="">
                            <div class="box-header">
                                <h3 class="box-title">Objects Uploaded</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Desc</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->objects as $object)
                                        <tr>
                                            <td><a href="/object/{{ $object->id}}">{{ $object->title }}</a></td>
                                            <td>{{ $object->category }}</td>
                                            <td>{{ $object->description }}</td>
                                            <td>{{ $object->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Desc</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    @else
                        {{-- check whether customer--}}
                        <hr>
                        {{--objects list table--}}
                        <div class="box" id="">
                            <div class="box-header">
                                <h3 class="box-title">Posts Posted</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Desc</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach($user->posts as $post)--}}
                                    {{--<tr>--}}
                                    {{--<td>{{ $post->title }}</td>--}}
                                    {{--<td>{{ $post->category }}</td>--}}
                                    {{--<td>{{ $post->description }}</td>--}}
                                    {{--<td>{{ $post->created_at }}</td>--}}
                                    {{--</tr>--}}
                                    {{--@endforeach--}}
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Desc</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    @endif
                @endauth
                <hr>
            </div>
        </div>
    </div>
</div>


<!-- SCRIPTS -->

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>

<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<!-- Bootstrap dropdown -->
<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>

<script>
    new WOW().init();
</script>

{{--modal--}}
<!--Modal: Contact form-->
<div class="modal fade" id="more" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header blue-grey lighten-5">
                <h4 class="title"><i class="fa fa-user"></i>User Info</h4>
                <button type="button" class="close waves-effect waves-light black-text" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
                <p class="text-lg-left"><b>Name: </b> {{ $user->first_name.' '.$user->last_name}}</p>
                <p class="text-lg-left">
                    <b>Type: </b> {{ $user->type == 1?'Designer':($user->type == 2?'Individual Customer':(Auth::user()->type == 3?'Business Organization':'')) }}
                </p>
                <p class="text-lg-left"><b>Email: </b> {{ $user->email}}</p>
                @auth
                    @if(auth()->user()->id == $user->id)
                        <p class="text-lg-left"><b>Phone Number: </b> {{ $user->phone}}</p>
                        <p class="text-lg-left"><b>Date of
                                Birth: </b> {{ \Carbon\Carbon::parse($user->dob)->format('Y M d')}}</p>
                    @endif
                @endauth
                <p class="text-lg-left"><b>Date
                        Joined: </b>{{ \Carbon\Carbon::parse($user->created_at)->format('Y M d')}}</p>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Contact form-->

<script>
    $(function () {
        $('#data1').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
        $('#data2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })


</script>