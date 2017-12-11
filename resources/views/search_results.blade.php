{{--@extends('layouts.app')--}}
@include('includes.header')
@include('includes.navbar')

<div class="container" style="padding-top: 30px; padding-bottom: 30px;">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified black">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Objects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Questions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Advertisements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel4" role="tab">Tasks</a>
        </li>
    </ul>
    <!-- Tab panels -->
    <div class="tab-content card">
        <!--Panel 1-->
        <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
            <div class="row">
                @if(count($objects)==0)
                    <h4>No Objects</h4>
                @endif
                @foreach($objects as $object)
                    <div class="col-md-6">
                        <!--Card-->
                        <div class="card">
                            <!--Card image-->
                            <img class="img-fluid" src="{{ ($object->texture_location != '/storage/models/main/'.$object->id.'/textures/')?$object->texture_location:'/img/'.rand(1,2).'.jpg' }}" alt="{{ $object->title }}" style="max-height: 300px">
                        {{-- style="max-height: 300px">--}}
                        <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">{{ $object->title }}</h4>
                                <!--Text-->
                                <p class="card-text">Description: {{ $object->description }}</p>
                                <p class="card-text">Posted by: {{ $object->user->first_name }}</p>
                                <a href="{{ route('object.show', $object->id) }}" target="_blank"
                                   class="btn btn-outline-elegant waves-effect btn-sm">View</a>
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
            <div class="row">
                @if(count($posts)==0)
                    <h4>No Posts</h4>
                @endif
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <p class="card-text">Topic: {{ $post->title }}</p>
                                <hr>
                                <!--Text-->
                                <p class="card-text">Category: {{ $post->category }}</p>
                                <p class="card-text">Description: {{ $post->description }}</p>
                                <p class="card-text">Asked by: {{ $post->user->first_name }}</p>
                                <a href="{{ route('post.show', $post->id) }}" target="_blank"
                                   class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                            </div>
                        </div>
                        <br>
                        <!--/.Card-->
                    </div>
                @endforeach
            </div>
        </div>
        <!--/.Panel 2-->
        <!--Panel 3-->
        <div class="tab-pane fade" id="panel3" role="tabpanel">
            <div class="row">
                @if(count($advertisements)==0)
                    <h4>No Advertisements</h4>
                @endif
                @foreach($advertisements as $ad)
                    <div class="col-md-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card image-->
                            <img class="img-fluid text-center" src="{{$ad->image}}" alt="img"
                                 style="max-height: 300px;">
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">{{ $ad->title }}</h4>
                                <!--Text-->
                                <p class="card-text">{{ $ad->description }}</p>
                                <a href="{{ route('advertisement.show', $ad->id) }}" target="_blank"
                                   class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                            </div>
                        </div>
                        <br>
                        <!--/.Card-->
                    </div>
                @endforeach
            </div>
        </div>
        <!--/.Panel 3-->
        <!--Panel 4-->
        <div class="tab-pane fade" id="panel4" role="tabpanel">
            <div class="row">
                @if(count($tasks)==0)
                    <h4>No Tasks</h4>
                @endif
                @foreach($tasks as $task)
                    <div class="col-md-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <p class="card-text">Topic: {{ $task->title }}</p>
                                <hr>
                                <!--Text-->
                                <p class="card-text">Description: {{ $task->description }}</p>
                                <p class="card-text">Asked by: {{ $task->user->first_name }}</p>
                                <a href="{{ route('task.show', $task->id) }}" target="_blank"
                                   class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                            </div>
                        </div>
                        <br>
                        <!--/.Card-->
                    </div>
                @endforeach
            </div>
        </div>
        <!--/.Panel 4-->
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

