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
    <div class="text-center">
        <h2>Advertisement list</h2>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($ads as $ad)

                <div class="col-4">

                    <br/><br/>
                    <div class="col-md-6">
                        <div class="card" style="width: 20rem; height: 22rem; " >
                            <img src="{{$ad->image}}" class="img img-rounded img-responsive" style="max-height: 200px;">
                            <div class="card-block">
                                <h4 class="card-title" style="text-align: center;">
                                    {{ $ad->title }}
                                </h4>
                                <p class="card-text" style="text-indent: 15px;">'{{ str_limit($ad->description, 40) }}'</p>
                                <div class="card-footer">
                                    <a href="/advertisement/{{ $ad->id }}" class="btn btn-outline-elegant waves-effect btn-md">Veiw</a>
                                    <a href="/advertisement/edit/{{ $ad->id }}" class="btn btn-outline-elegant waves-effect btn-md">Edit</a>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br/>
                    </div>
                </div>

            @endforeach


        </div>
    </div>



{{ $ads->links() }}

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

</html>