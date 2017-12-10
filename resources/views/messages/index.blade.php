<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat box</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/libs/mdb4/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/libs/mdb4/css/mdb.min.css" rel="stylesheet">
    <!-- compiled core CSS -->
    <link href="/libs/mdb4/css/compiled.min.css" rel="stylesheet">
    <style>
        body{
            margin-top: 65px;
        }
    </style>

    <style>
        .basic-textarea textarea {
            height: auto;
        }

        .card.chat-room .friend-list li {
            border-bottom: 1px solid #e0e0e0; }
        .card.chat-room .friend-list li:last-of-type {
            border-bottom: none; }

        .card.chat-room img.rounded-circle {
            border-radius: 50%; }

        .card.chat-room img.avatar {
            height: 3rem;
            width: 3rem; }

        .card.chat-room .text-small {
            font-size: 0.95rem; }

        .card.chat-room .text-smaller {
            font-size: 0.75rem; }
    </style>

    <!-- JQuery -->
    <script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.min.js"></script>
</head>
<body>

@include('includes.navbar')

<div class="container">
    <div class="card grey lighten-3 chat-room">
        <div class="card-body">

            <!-- Grid row -->
            <div class="row px-lg-2 px-2">

                <!-- Grid column -->
                <div class="col-md-6 col-xl-4 px-0" style="max-height: 70vh; overflow-y: auto;">

                    <h6 class="font-bold mb-3 text-center text-lg-left">Messages</h6>

                    <div class="white z-depth-1 px-3 pt-3 pb-1">
                        <ul class="list-unstyled friend-list">

                            @foreach($users as $user)

                                @if($id != auth()->user()->id)

                                    <li class="p-2 msg-usr-li {{ ($id != 0 && $user->id == $id)?'active grey lighten-1':'' }} " data-id="{{ $user->id }}">
                                        <a href="#" class="d-flex justify-content-between msg-user-a" data-id="{{ $user->id }}">
                                            <img src="{{ $user->profile_pic }}" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                            <div class="text-small">
                                                <strong>
                                                    {{ $user->first_name." ".$user->last_name }}
                                                </strong>
                                                <p class="last-message text-muted">
                                                    {{  $user->lastMsgWithAuth($user->id) != null ? $user->lastMsgWithAuth($user->id)->message:'' }}
                                                </p>
                                            </div>
                                            <div class="chat-footer">
                                                <p class="text-smaller text-muted mb-0">{{  $user->lastMsgWithAuth($user->id) != null ? $user->lastMsgWithAuth($user->id)->getAgeAttr():'' }}</p>
                                                <span class="text-muted float-right"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
                                            </div>
                                        </a>
                                    </li>
                                @endif

                            @endforeach


                            {{--<li class="active grey lighten-3 p-2 msg-usr-li" data-id="1">
                                <a href="#" class="d-flex justify-content-between">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                    <div class="text-small">
                                        <strong>John Doe</strong>
                                        <p class="last-message text-muted">Hello, Are you there?</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">Just now</p>
                                        <span class="badge badge-danger float-right">1</span>
                                    </div>
                                </a>
                            </li>



                            <li class="p-2 msg-usr-li" data-id="3">
                                <a href="#" class="d-flex justify-content-between">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                    <div class="text-small">
                                        <strong>Alex Steward</strong>
                                        <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">Yesterday</p>
                                        <span class="text-muted float-right"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 msg-usr-li" data-id="4">
                                <a href="#" class="d-flex justify-content-between">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-3" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                    <div class="text-small">
                                        <strong>Ashley Olsen</strong>
                                        <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">Yesterday</p>
                                        <span class="text-muted float-right"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 msg-usr-li" data-id="5">
                                <a href="#" class="d-flex justify-content-between">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-4" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                    <div class="text-small">
                                        <strong>Kate Moss</strong>
                                        <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">Yesterday</p>
                                        <span class="text-muted float-right"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 msg-usr-li" data-id="6">
                                <a href="#" class="d-flex justify-content-between">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                    <div class="text-small">
                                        <strong>Lara Croft</strong>
                                        <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">Yesterday</p>
                                        <span class="text-muted float-right"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 msg-usr-li" data-id="7">
                                <a href="#" class="d-flex justify-content-between">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                    <div class="text-small">
                                        <strong>Brad Pitt</strong>
                                        <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">5 min ago</p>
                                        <span class="text-muted float-right"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </li>--}}



                        </ul>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                    <div class="chat-message" id="chat-history">



                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
    </div>
</div>

<!-- SCRIPTS -->

{{--<!-- Bootstrap dropdown -->
<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>--}}

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>

<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<script>

    var user_id = 0;

    function submitForm() {
        var form = $('#send-msg-form')[0];
        var formData = new FormData(form);

        // Display the key/value pairs
        /*
         for (var pair of formData.entries()) {
         console.log(pair[0]+ ', ' + pair[1]);
         }*/

        $.ajax({
            url: '{{ route('message.store') }}',
            method: 'POST',
            data: formData,
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function (returnedData) {
                $('#chat-history-div').append(returnedData);
            },
            error: function (returnedData) {
                console.log(returnedData);
                $('#chat-history-div').append(returnedData);
            },
            complete: function (returnedData) {
                scrollDown();
            }
        });
    }

    function scrollDown() {
        /*var chat_his_div    = $('#chat-history-div');
        var height = chat_his_div[0].scrollHeight;
        chat_his_div.scrollTop(height);*/
        $('#chat-history-div').scrollTop($('#chat-history-div')[0].scrollHeight);
    }

    $(function() {


        setInterval(function(){

            if (user_id != 0){
                $.ajax({
                    url: '/messages/request_updates/'+user_id,
                    method: 'GET',
                    success: function (returnedData) {
//                        console.log(returnedData);
//                        console.log(returnedData.length);
                        if (returnedData.length){
                            $('#chat-history').html(returnedData);
                        scrollDown();
                        }

                    }
                });
            }

            }, 2000);

        $(document).on('click', '.msg-usr-li', function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');

            user_id = id;
//            console.log(id);

            $('.msg-usr-li').removeClass('active grey lighten-1');
            $(this).addClass('active grey lighten-1');

            $.ajax({
                url: '/messages/request/'+id,
                method: 'GET',
                success: function (returnedData) {
                    $('#chat-history').html(returnedData);
                    scrollDown();
                }
            });

        });

        $(document).on('click', '#send-msg', function (e) {
            e.preventDefault();
            submitForm();

        });

        @if($id != 0)
            $.ajax({
                url: '/messages/request/{{ $id }}',
                method: 'GET',
                success: function (returnedData) {
                    $('#chat-history').html(returnedData);
                }
            });
        @endif

    });
</script>

<script>
    new WOW().init();
</script>

</body>
</html>