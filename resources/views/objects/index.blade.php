@extends('layouts.objects')

@section('title', ' - Objects')

@section('content')

    <div class="container" style="padding-top: 30px">

        <div class="row">
            @foreach($objects as $object)
            <div class="col-md-4">
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

@endsection