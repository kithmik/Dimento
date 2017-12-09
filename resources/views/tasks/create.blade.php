@include('includes.header')
@include('includes.navbar')

<body>

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

<div class="container" style="padding-top: 20px; padding-bottom: 20px">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified black">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Fixed Price</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Open Price</a>
        </li>
    </ul>
    <!-- Tab panels -->
    <div class="tab-content card">
        <!--Panel 1-->
        <div class="tab-pane fade in show active mx-auto" id="panel1" role="tabpanel">
            <!-- Form task post -->
            <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data" name="fixed_price">
                {{ csrf_field() }}
                <div class="container">
                    <input type="hidden" name="type" value="1">
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-id-card prefix grey-text" aria-hidden="true"></i>
                            <input type="text" id="job" class="form-control" name="title" placeholder="Job Title" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-sticky-note-o prefix grey-text" aria-hidden="true"></i>
                            <textarea type="text" id="description" class="md-textarea" style="height: 40px"
                                      name="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="file-field">
                            <div class="btn btn-elegant btn-sm ">
                                <i class="fa fa-file-image-o prefix" aria-hidden="true"></i> Choose image
                                <input type="file" name="image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path " type="text" placeholder="Displaying image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form" id="amount-div">
                            <i class="fa fa-usd prefix grey-text " aria-hidden="true"></i>
                            <input type="number" min="5" step="0.5" id="amount" class="form-control" name="amount"
                                   placeholder="Amount paid for job">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-calendar prefix grey-text"></i>
                            <input placeholder="Select date" type="text" id="date-picker-1"
                                   class="form-control datepicker" name="deadline">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-times-circle-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Select time" type="text" id="time-picker-1"
                                   class="form-control timepicker" name="time">
                            <label for="time-picker-1"></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-elegant waves-effect btn-sm"><i
                                    class="fa fa-arrow-circle-up" aria-hidden="true"></i> POST
                        </button>
                    </div>
                </div>
            </form>
            <!-- Form jobpost -->
        </div>
        <!--/.Panel 1-->
        <!--Panel 2-->
        <div class="tab-pane fade  mx-auto" id="panel2" role="tabpanel">
            <!-- Form task post -->
            <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data" name="open_price">
                {{ csrf_field() }}
                <div class="container">
                    <input type="hidden" name="type" value="0">
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-id-card prefix grey-text" aria-hidden="true"></i>
                            <input type="text" id="job" class="form-control" name="title" placeholder="Job Title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-sticky-note-o prefix grey-text" aria-hidden="true"></i>
                            <textarea type="text" id="description" class="md-textarea" style="height: 40px"
                                      name="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="file-field">
                            <div class="btn btn-elegant btn-sm ">
                                <i class="fa fa-file-image-o prefix" aria-hidden="true"></i> Choose image
                                <input type="file" name="image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Displaying image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-calendar prefix grey-text"></i>
                            <input placeholder="Select date" type="text" id="date-picker-2"
                                   class="form-control datepicker" name="deadline">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <i class="fa fa-times-circle-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Select time" type="text" id="time-picker-2"
                                   class="form-control timepicker" name="time">
                            <label for="time-picker-2"></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-elegant waves-effect btn-sm" ><i
                                    class="fa fa-arrow-circle-up" aria-hidden="true"></i> POST
                        </button>
                    </div>
                </div>
            </form>
            <!-- Form jobpost -->
        </div>
        <!--/.Panel 2-->
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

</script>