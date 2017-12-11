@extends('layouts.objects')

@section('title', ' - Objects')

@section('content')

    <div class="container" style="padding-top: 30px">
        <div class="jumbotron-fluid">
            <div class="row">
                @foreach($objects as $object)
                    <div class="col-md-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card image-->
                            <img class="img-fluid" src="{{ ($object->texture_location != '/storage/models/main/'.$object->id.'/textures/')?$object->texture_location:'/img/'.rand(1,2).'.jpg' }}" alt="{{ $object->title }}" style="max-height: 300px">
                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">{{ $object->title }}</h4>
                                <!--Text-->
                                <p class="card-text" style="text-transform: capitalize">{{ $object->description }}</p>
                                <p class="card-text" style="text-transform: capitalize">By: <a href="{{ route('user.show',$object->user->id) }}">{{ $object->user->first_name }}</a></p>
                                <a href="{{ route('object.show', $object->id) }}" target="_blank" class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                            </div>
                        </div>
                        <br>
                        <!--/.Card-->
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection