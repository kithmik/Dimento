@include('includes.header')
@include('includes.navbar')

<body>

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

<div class="container" style="padding-top: 20px; padding-bottom: 20px">


    {{--<div class="row">
        <div class="col-md-6 mx-auto">
            <!--Card-->
            <div class="card">
                <div class="card-header text-center">
                    Task Details
                </div>

                <!--Card content-->
                <div class="card-body">
                    <p class="card-text"><b>Title: </b>{{ $task->title }}</p>
                    <p class="card-text"><b>Description: </b>{{ $task->description }}</p>
                    <p class="card-text"><b>Posted by: </b><a href="{{ route('user.show', $task->user->id) }}" >{{ $task->user->first_name.' '.$task->user->last_name }}</a></p>
                    <p class="card-text"><b>Posted on: </b>{{ \Carbon\Carbon::parse($task->created_at)->format('Y M d g:i A')}}</p>
                    <p class="card-text"><b>Deadline: </b>{{ \Carbon\Carbon::parse($task->deadline)->format('Y M d g:i A')}}</p>
                    @if($task->type==1)
                        <p class="card-text"><b>Price: </b>{{ $task->amount}}</p>
                    @endif
                    @auth
                    @if(auth()->user()->type == 3)
                        <a href="#" class="btn btn-outline-elegant waves-effect btn-sm">Edit</a>
                        <a href="#" class="btn btn-outline-elegant waves-effect btn-sm">Delete</a>
                    @elseif(auth()->user()->type == 1)
                        @if($task->type==1)
                            <a href="/bid/create/{{ $task->id }}" class="btn btn-outline-elegant waves-effect btn-sm">Apply</a>
                        @else
                            <a href="/bid/create/{{ $task->id }}" class="btn btn-outline-elegant waves-effect btn-sm">Bid</a>
                        @endif
                    @endif
                    @endauth

                </div>

            </div>
            <!--/.Card-->
        </div>
    </div>--}}

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified black">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Apply for this Task</a>
        </li>
        {{-- <li class="nav-item">
             <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Open Price</a>
         </li>--}}
    </ul>
    <!-- Tab panels -->
    <div class="tab-content card">


        <!--Panel 1-->
        <div class="tab-pane fade in show active mx-auto" id="panel1" role="tabpanel">
            <!-- Form task post -->
            <form action="{{ route('bid.store') }}" method="POST" enctype="multipart/form-data" name="fixed_price">
                {{ csrf_field() }}

                {{--<input type="hidden" name="type" id="type" value="1">--}}

                <div class="container">

                    <input type="hidden" name="task_id" value="{{ $task->id }}">

                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-id-card prefix grey-text" aria-hidden="true"></i>
                            <input type="text" id="title" class="form-control" name="title" placeholder="Title" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-sticky-note-o prefix grey-text" aria-hidden="true"></i>
                            <textarea type="text" id="description" class="md-textarea" style="height: 40px"
                                      name="description" placeholder="Description"></textarea>
                        </div>
                    </div>

                    @if($task->type == 1)
                    <div class="col-md-12">
                        <div class="file-field">
                            <div class="btn btn-elegant btn-sm ">
                                <i class="fa fa-file-image-o prefix" aria-hidden="true"></i> Choose Project Proposal
                                <input type="file" name="proposal">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path " type="text" placeholder="Displaying image">
                            </div>
                        </div>
                    </div>
                    @else

                    <div class="col-md-12">
                        <div class="md-form" id="amount-div">
                            <i class="fa fa-usd prefix grey-text " aria-hidden="true"></i>
                            <input type="number" min="5" step="0.5" id="amount" class="form-control" name="amount"
                                   placeholder="Amount you expect for job">
                        </div>
                    </div>
                    @endif
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-elegant waves-effect btn-sm"><i
                                    class="fa fa-arrow-circle-up" aria-hidden="true"></i> POST
                        </button>
                    </div>
                </div>
            </form>
            <!-- Form jobpost -->
        </div>

    </div>
</div>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.js"></script>
<!-- Bootstrap tooltips -->
{{--<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>--}}
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>
</body>
<!-- compiled core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>

<script>

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Time Picker Initialization
    $('#time-picker-1').pickatime({
        twelvehour: true
    });
    $('#time-picker-2').pickatime({
        twelvehour: true
    });

    $('#type-1').click(function (e) {
//        e.preventDefault();
        $('#amount-div').show();
    });

    $('#type-2').click(function (e) {
//        e.preventDefault();
        $('#amount-div').hide();
    });

</script>