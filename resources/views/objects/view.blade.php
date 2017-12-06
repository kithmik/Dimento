@extends('layouts.objects')

@section('title', ' - Objects')

@section('content')

    View the 3D models

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-avatar">
                                        <div id="object-view-div">
                                            viewer
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-12 pull-left">
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                Title
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                User
                                            </div>
                                            <div class="col-md-6 pull-right text-right">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                Time
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection