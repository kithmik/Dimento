@extends('layouts.master')

@section('title', ' Users')

@section('content')


    <!--Modal: Subscription From-->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header blue-grey darken-3 white-text">
                    <h4 class="title"><i class="fa fa-newspaper-o"></i> Send Message</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">

                    <form action="{{ route('message.store') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" id="user_id" value="user_id">


                        <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="user_name" class="form-control" disabled="disabled">
                            <label for="user_name" id="user_name_label"></label>
                        </div>

                        <div class="md-form form-sm">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="text" id="message" name="message" class="form-control">
                            <label for="form28">Say Hello!</label>
                        </div>

                        <div class="text-center mt-1-half">
                            <button class="btn btn-info mb-1">Submit <i class="fa fa-check ml-1"></i></button>
                        </div>
                    </form>



                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Subscription From-->

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($users as $user)

                        <div class="col-md-2" >
                            <a class="chip chip-lg"  tabindex="0"  role="button" data-toggle="popover" data-trigger="focus" title="{{ $user->first_name." ".$user->last_name }}"
                               data-html="true"
                               data-content="
                               <a href='{{ route('user.show', $user->id) }}' class='btn btn-sm btn-outline-elegant btn-rounded waves-effect'>View</a>

                               <a data-id='{{ $user->id }}'
                               data-name='{{ $user->first_name." ".$user->last_name }}'
                               href='message/to/{{ $user->id }}'
                               class='btn btn-sm btn-outline-elegant btn-rounded waves-effect msg-btn'>Message</a>
                               ">
                                <img src="{{ $user->profile_pic }}" alt="{{ $user->first_name." ".$user->last_name }}">
                                {{ $user->first_name." ".$user->last_name }}
                            </a>
                        </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <script>

        function openMessageModal(user_id, user_name) {
            console.log('user id: '+user_id);
            console.log(user_name);
        }

        $(function () {

            $('[data-toggle="popover"]').popover();


            $(document).on('click', '.msg-bn', function (e) {

                console.log('clicked');

                e.preventDefault();

                var user_id = $(this).attr('data-id');
                var user_name = $(this).attr('data-name');

                console.log('user id: '+user_id);
                console.log(user_name);

                /*$('#user_name_label').html(user_name);
                $('#user_name').value(user_name);
                $('#user_id').value(user_id);


                $('#messageModal').modal('show');*/

            });
        });
    </script>


@endsection