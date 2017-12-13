@extends('layouts.master')

@section('title', ' Tasks')

@section('content')
    {{--{{ $task }}--}}

    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <!--Card-->
                <div class="card">
                    <div class="card-header text-center">
                        Task Details
                    </div>

                    <!--Card content-->
                    <div class="card-body">
                        <p class="card-text"><b>Title: </b>{{ $task->title }}</p>
                        <p class="card-text"><b>Description: </b>{{ $task->description }}</p>
                        <p class="card-text"><b>Posted by: </b><a href="{{ route('user.show', $task->user->id) }}" >{{ $task->user->first_name.' '.$task->user->last_name }}</a></p>
                        <p class="card-text"><b>Posted on: </b>{{ \Carbon\Carbon::parse($task->created_at)->format('Y M d g:i A')}}</p>
                        <p class="card-text"><b>Deadline: </b>{{ \Carbon\Carbon::parse($task->deadline)->format('Y M d g:i A')}}</p>
                        @if($task->type==1)
                            <p class="card-text"><b>Price: </b>{{ $task->amount}}</p>
                        @endif
                        @auth
                            @if(auth()->user()->type == 3 || $task->user_id == auth()->user()->id)

                                <a href="#" class="btn btn-outline-elegant waves-effect btn-sm">Edit</a>
                                <a href="#" class="btn btn-outline-elegant waves-effect btn-sm">Delete</a>
                            @elseif(auth()->user()->type == 1)
                                @if($task->type==1)
                                    <a href="/bid/create/{{ $task->id }}" class="btn btn-outline-elegant waves-effect btn-sm">Apply</a>
                                @else
                                    <a href="/bid/create/{{ $task->id }}" class="btn btn-outline-elegant waves-effect btn-sm">Bid</a>
                                @endif
                            @endif
                        @endauth

                    </div>

                </div>
                <!--/.Card-->
            </div>
        </div>
    </div>



@endsection

{{--{{ \Carbon\Carbon::parse($task->deadline)->format('Y M d g:i A')}}--}}