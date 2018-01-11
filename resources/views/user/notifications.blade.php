{{--@extends('layouts.app')--}}
@include('includes.header')
@include('includes.navbar')

<br>
<div class="container">
    <div class="row mx-auto">
        <div class="col-md-6 mx-auto">
            <div class="row mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Notifications</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($notifications as $notification)
                                <li class="list-group-item hoverable">
                                    <a href="{{ $notification->link }}">
                                        {!! $notification->notification !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
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

