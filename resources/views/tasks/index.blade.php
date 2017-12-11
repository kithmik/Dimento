@extends('layouts.master')

{{--@section('title', ' Tasks')--}}

@section('content')

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
@endsection