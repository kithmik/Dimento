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
                <div class="avatar"><img src="{{ $user->profile_pic != null ? $user->profile_pic: '/img/avatar.png' }}" class="rounded-circle">
                </div>

                <div class="card-body">
                    <!--Name-->
                    <h4 class="card-title">{{ $user->first_name.' '.$user->last_name}}</h4>
                    <hr>
                    <!--Quotation-->
                    <p class="text-lg-left">
                        <b>Type: </b> {{ $user->type == 1?'Designer':($user->type == 2?'Individual Customer':($user->type == 3?'Business Organization':'Admin')) }}
                    </p>
                    <p class="text-lg-left"><b>Email: </b> {{ $user->email}}</p>
                    <p class="text-lg-left"><b>Date
                            Joined: </b>{{ \Carbon\Carbon::parse($user->created_at)->format('Y M d')}}</p>

                    @auth
                        @if(auth()->user()->id == $user->id)
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm"
                                    data-toggle="modal" data-target="#edit">Edit
                            </button>
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm">Delete</button>
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm"
                                    data-toggle="modal" data-target="#more">More
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-elegant waves-effect btn-sm"
                                    data-toggle="modal" data-target="#more">More
                            </button>
{{--<<<<<<< HEAD--}}
                            <button data-id="{{ $user->id }}" id="follow_btn" class="btn btn-outline-elegant waves-effect btn-sm follow_btn">
                                {{ $user->isFollowing()?'Unfollow':'Follow' }}
{{--=======
                            <button data-id="{{ $user->id }}"
                                    class="btn btn-outline-elegant waves-effect btn-sm follow_btn">Follow
>>>>>>> b77464ff37e60cec4f4e51be720e5ee43d2fb2a5--}}
                            </button>
                        @endif
                    @endauth
                </div>
            </div>
            <!--/.Card-->
        </div>
        @if($user->type != 4)
        <div class="col-md-8">
            <div class="card" style="min-height: 500px; margin-bottom: 20px">
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
                                            <td><a href="{{ route('object.show', $object->id) }}"
                                                   target="_blank">{{ $object->title }}</a></td>
                                            <td>{{ $object->category }}</td>
                                            <td>{{ $object->description }}</td>
                                            <td>{{ \Carbon\Carbon::parse($object->created_at)->format('Y M d g:i A')}}</td>
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
                    @elseif($user->type == 2)
                        {{-- check whether customer--}}

                        {{--tasks list table--}}
                        <div class="box" id="">
                            <div class="box-header">
                                <h3 class="box-title">Tasks Posted</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Desc</th>
                                        <th>Deadline</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->tasks as $task)
                                        <tr>
                                            <td><a href="{{ route('task.show', $task->id) }}"
                                                   target="_blank">{{ $task->title }}</a></td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ \Carbon\Carbon::parse($task->deadline)->format('Y M d g:i A')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($task->created_at)->format('Y M d g:i A')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Desc</th>
                                        <th>Deadline</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    @elseif($user->type == 3)
                        {{-- check whether business rep--}}

                        {{--jobs list table--}}
                        <div class="box" id="">
                            <div class="box-header">
                                <h3 class="box-title">Ads Posted</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data3" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Desc</th>
                                        <th>Posted On</th>
                                        <th>Views</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->advertisements as $ad)
                                        <tr>
                                            <td><a href="{{ route('advertisement.show', $ad->id) }}"
                                                   target="_blank">{{ $ad->title }}</a></td>
                                            <td>{{ $ad->description }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ad->created_at)->format('Y M d g:i A')}}</td>
                                            <td>{{ $ad->category }}</td>
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
                        <br>
                        <!-- /.box -->
                        {{--tasks list table--}}
                        <div class="box" id="">
                            <div class="box-header">
                                <h3 class="box-title">Tasks Posted</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Desc</th>
                                        <th>Deadline</th>
                                        <th>Posted On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->tasks as $task)
                                        <tr>
                                            <td><a href="{{ route('task.show', $task->id) }}"
                                                   target="_blank">{{ $task->title }}</a></td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ \Carbon\Carbon::parse($task->deadline)->format('Y M d g:i A')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($task->created_at)->format('Y M d g:i A')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Desc</th>
                                        <th>Deadline</th>
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
        @endif
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
<!--Modal: User info-->
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
<!--Modal: user info-->


<!-- Modal -->
<!--Modal: edit info-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header blue-grey lighten-5">
                <h4 class="title"><i class="fa fa-user"></i>Edit Info</h4>
                <button type="button" class="close waves-effect waves-light black-text" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <form method="post" action="{{ route('user.update', auth()->user()->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body mx-3">
                    <div class="md-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <input name="first_name" type="text" id="first-name" class="form-control validate"
                                       value="{{ auth()->user()->first_name }}">
                                <label data-error="" data-success="" for="first-name">First name</label>
                            </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <input name="last_name" type="text" id="last-name" class="form-control validate"
                                       value="{{ auth()->user()->last_name }}">
                                <label data-error="" data-success="" for="last-name">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-sm-3">
                                <label data-error="" data-success="" for="profile-pic">Profile Picture</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="profile_pic" type="file" id="profile-pic" class="form-control validate">
                            </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-sm-7">
                                <input name="phone" type="text" id="telephone" class="form-control validate"
                                       value="{{ auth()->user()->phone }}">
                                <label data-error="" data-success="" for="telephone">Telephone</label>
                            </div>
                            <div class="col-sm-5">
                                <input name="phone_privacy" {{ $user->phone_privacy?'checked':'' }} type="checkbox"
                                       id="telephone_privacy">
                                <label for="telephone_privacy" class="grey-text">Private</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" id="dob" class="form-control validate"
                                       value="{{ auth()->user()->dob }}">
                                <label class="datepicker" data-error="" data-success="" for="dob">Date of Birth</label>
                            </div>
                        </div>

                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-sm-7">
                                <input name="email" type="text" id="email" class="form-control validate"
                                       value="{{ auth()->user()->email }}" disabled="">
                                <label data-error="" data-success="" for="email">Email</label>
                            </div>
                            <div class="col-sm-5">
                                <input name="email_privacy" {{ $user->email_privacy?'checked':'' }} type="checkbox"
                                       id="email_privacy">
                                <label for="email_privacy" class="grey-text">Private</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-elegant waves-effect btn-sm">Update</button>
                </div>

            </form>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: edit info-->
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
<script>
    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();

        $('.follow_btn').click(function (e) {
            e.preventDefault();
            var user_id = $(this).attr('data-id');
            $.ajax({
                url: '/user/follow',
                method: 'POST',
                data: {
                    'id':'{{ $user->id }}',
                    '_token': '{{ csrf_token() }}'
                },
                success: function (returnedData) {
                    if ( typeof returnedData.status !== undefined && returnedData.status == 1){
                        $('#follow_btn').html('Unfollow');
                        toastr["success"]('Success: '+returnedData.msg);
                    }
                    else {
                        $('#follow_btn').html('Follow');
                        toastr["success"]('Success: '+returnedData.msg);
                    }
                    console.log(returnedData);
                },
                error: function (returnedData) {
                    console.log(returnedData);
                }
            });
        });

    });
    // Data Picker Initialization
    var d = new Date();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 120,
        max: new Date(d.getFullYear() - 12, d.getMonth() - 12, d.getDay() + 14),
        format: 'yyyy-mm-dd'
    });

</script>