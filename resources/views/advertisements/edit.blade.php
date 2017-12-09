<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/libs/mdb4/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/libs/mdb4/css/mdb.min.css" rel="stylesheet">
    <!-- compiled core CSS -->
    <link href="/libs/mdb4/css/compiled.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/libs/mdb4/css/style.css" rel="stylesheet">

</head>
<body>

<!-- @foreach($errors->all() as $error)
    {{ $error }}

@endforeach -->

<!-- Form advertisement -->
<form class="" action="{{ route('advertisement.update') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    {{ method_field('PUT') }}

    <div class="container">
        <div class="col-md-6">
            <div class="card  text-center" >
                <div class="card-header black white-text">
                    Advertisement edit Form
                </div>
                <br/><br/>
                <div class="md-form">
                    <i class="fa fa-tag prefix grey-text"></i>
                    <input type="text" id="form4" class="form-control" name="title" value="{{$ad->title}}">
                    <label for="form4">Title</label>
                </div>



                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea" style="height: 80px" name="description" value='{{$ad->description}}'></textarea>
                    <label for="form8">Description</label>
                </div>


                <div class="file-field">
                    <div class="btn btn-outline-elegant waves-effect btn-md">
                        <span>Choose image file</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="This will be displayed as the advertisement image" value="{{$ad->image}}">
                    </div>
                </div>
                <br/><br/>

                <div class="md-form">
                    <i class="fa fa-cog prefix grey-text" ></i>
                    <input type="text" id="form5" class="form-control" name="object" value="{{$ad->object}}">
                    <label for="form5">Object</label>
                </div>


                <div class="md-form">
                    <i class="fa fa-italic prefix grey-text"></i>
                    <input type="text" id="form5" class="form-control" name="texture" value="{{$ad->texture}}">
                    <label for="form5">Texture</label>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <i class="fa fa-calendar prefix grey-text" ></i>
                            <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker" name="deadline" value="{{$ad->deadline}}">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="md-form">
                            <input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker" name="time" value='{{$ad->time}}'>
                            <label for="input_starttime" ></label>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button class="btn btn-outline-elegant waves-effect btn-md">Post </button>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- Form advertisement -->


<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/mdb.js"></script>
</body>
<!-- compiled core JavaScript -->
<script type="text/javascript" src="/libs/mdb4/js/compiled.min.js"></script>
<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').material_select();

    });
    // Time Picker Initialization
    // var t = new time();
    $('#input_starttime').pickatime({
        twelvehour: true
    });

    // Data Picker Initialization
    var d = new Date();
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd'
    });
</script>

</body>
</html>