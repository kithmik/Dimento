@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading black white-text">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <p class="h5 text-center mb-4">Sign in</p>

                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="text" id="defaultForm-email" class="form-control">
                            <label for="defaultForm-email">Your email</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="defaultForm-pass" class="form-control">
                            <label for="defaultForm-pass">Your password</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-default">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
