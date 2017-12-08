
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
<form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">




    <p class="h5 text-center mb-4">
        <i class="fa fa-address-book prefix grey-text" style="font-size:36px"></i>
        Post Your Job
    </p>

    <p class="text-center mb-6">
    <div class="container">

        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-id-card prefix grey-text" aria-hidden="true"></i>
                <input type="text" id="job" class="form-control" name="title" placeholder="Job Title">

            </div>
        </div>


        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-sticky-note-o prefix grey-text" aria-hidden="true"></i>

                <textarea type="text" id="form8" class="md-textarea" style="height: 80px" name="description" placeholder="Description"></textarea>

            </div>
        </div>

        <div class="col-md-6">
            <div class="file-field">
                <div class="btn btn-primary btn-sm">
                    <i class="fa fa-file-image-o prefix grey-text" aria-hidden="true"></i>
                    Choose image file

                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="This will be displayed as an image">
                </div>
            </div>



            <div class="md-form" >
                <i class="fa fa-usd prefix grey-text " aria-hidden="true"></i>
                <input type="text" id="form5" class="form-control" name="amount" placeholder="Amount paid for job">
            </div>
        </div>

        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-calendar prefix grey-text" ></i>
                <input placeholder="Select date" type="text" id="date-picker-example" class="form-control datepicker" name="deadline">
            </div>
        </div>

        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-times-circle-o prefix grey-text" aria-hidden="true"></i>
                <input placeholder="Select time" type="text" id="input_starttime" class="form-control timepicker" name="time">
                <label for="input_starttime"></label>
            </div>
        </div>


        <div class="col-md-6" >
            <button type="button" class="btn btn-rounded btn-blue-grey" align="text-center"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i>POST</button>
        </div>
    </div>
</form>
</p>
<!-- Form jobpost -->


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