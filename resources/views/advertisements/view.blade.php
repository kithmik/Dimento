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

<form class="" action="/show/view" method="post" enctype="multipart/form-data">
    {{csrf_field()}}



    <div class="container">

        <div class="col-md-12">
            <div class="card  text-center" >
                <div class="card-header black white-text">
                    Advertisement View
                </div>
                <div class="text-left">
                    <h1 style="margin: 20px;"><b>Title</b>   {{$ad->title}}</h1>

                </div>
                <center>
                    <img src="{{$ad->image}}" class="img img-rounded img-responsive" style="width: 75%;height: 50%;">
                </center>
                <br/>
                <div class="text-left" ">
                <h2 style="margin-left:20px;"><b>Description</b></h2>
                <h4 style="margin-left: 200px;">{{$ad->description}}</h4>

            </div>

            <div class="text-left" ">
            <h2 style="margin-left: 20px;"> <b>Object</b></h2>
            <h4 style="margin-left: 200px;">{{$ad->object}}</h4>


        </div>
        <div class="text-left" ">
        <h2 style="margin-left: 20px;"> <b>Texture</b></h2>
        <h4 style="margin-left: 200px;">{{$ad->texture}}</h4>


    </div>
    <div class="text-left" ">
    <h2 style="margin-left: 20px;"> <b>Upload Date</b></h2>
    <h4 style="margin-left: 200px;">{{$ad->deadline}}</h4>

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


</body>
</html>