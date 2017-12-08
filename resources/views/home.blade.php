{{--@extends('layouts.app')--}}
@include('includes.header')
@include('includes.navbar')

<div class="container" style="padding-top: 30px">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified black">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Objects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Advertisements</a>
        </li>
    </ul>
    <!-- Tab panels -->
    <div class="tab-content card">
        <!--Panel 1-->
        <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
            <br>
            <div class="row">
                @foreach($objects as $object)
                    <div class="col-md-6">
                        <!--Card-->
                        <div class="card">
                            <!--Card image-->
                            <img class="img-fluid" src="{{$object->texture_location}}" alt="Card image cap">
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">{{ $object->title }}</h4>
                                <!--Text-->
                                <p class="card-text" style="text-transform: capitalize">{{ $object->description }}</p>
                                <a href="{{ route('object.show', $object->id) }}" target="_blank" class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                            </div>
                        </div>
                        <br>
                        <!--/.Card-->
                    </div>
                @endforeach
            </div>

        </div>
        <!--/.Panel 1-->
        <!--Panel 2-->
        <div class="tab-pane fade" id="panel2" role="tabpanel">
            <br>

        </div>
        <!--/.Panel 2-->
        <!--Panel 3-->
        <div class="tab-pane fade" id="panel3" role="tabpanel">
            <br>

        </div>
        <!--/.Panel 3-->
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

