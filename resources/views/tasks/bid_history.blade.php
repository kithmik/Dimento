@extends('layouts.master')

@section('title', ' Tasks')

@section('content')
    {{--{{ $task }}--}}

    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-md-8 mx-auto">
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
                        @if(auth()->user()->type == 4 || $task->user_id == auth()->user()->id)

                            <a href="#" class="btn btn-outline-elegant waves-effect btn-sm">Edit</a>
                            <a href="#" class="btn btn-outline-elegant waves-effect btn-sm">Delete</a>
                        @elseif(auth()->user()->type == 1)
                            @if($task->type==1)
                                <a href="/bid/create/{{ $task->id }}" class="btn btn-outline-elegant waves-effect btn-sm">Apply</a>
                            @else
                                <a href="/bid/create/{{ $task->id }}" class="btn btn-outline-elegant waves-effect btn-sm">Bid</a>
                            @endif
                        @endif

                        @if(auth()->user()->type == 4 || $task->user_id == auth()->user()->id)

                            @if($task->type == 1)
                                <div class="">
                                    <table id="data1" class="table table-bordered table-striped table-responsive table-hover">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Proposal</th>
                                            <th>Message</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($task->bids as $bid)
                                            <tr>
                                                <td>
                                                    <a href="/user/{{ $bid->user->id }}">
                                                        {{ $bid->user->first_name." ".$bid->user->last_name }}
                                                    </a>
                                                </td>
                                                <td>{{ $bid->title }}</td>
                                                <td>{{ $bid->description }}</td>
                                                <td>
                                                    <a href="{{ $bid->proposal }}" target="_blank">
                                                        {{ substr($bid->proposal, 24)  }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href='/message/to/{{ $bid->user->id }}'
                                                       class='btn btn-sm btn-outline-elegant btn-rounded waves-effect msg-btn'>Message</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="">
                                    <table id="data1" class="table table-bordered table-striped table-responsive table-hover">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Message</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($task->bids as $bid)
                                            <tr>
                                                <td>
                                                    <a href="/user/{{ $bid->user->id }}">
                                                        {{ $bid->user->first_name." ".$bid->user->last_name }}
                                                    </a>
                                                </td>
                                                <td>{{ $bid->title }}</td>
                                                <td>{{ $bid->description }}</td>
                                                <td>
                                                    {{ $bid->amount }}
                                                </td>
                                                <td>
                                                    <a href='/message/to/{{ $bid->user->id }}'
                                                       class='btn btn-sm btn-outline-elegant btn-rounded waves-effect msg-btn'>Message</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                        @else

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