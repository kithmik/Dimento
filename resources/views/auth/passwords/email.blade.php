@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <!--Panel-->
                <div class="card  text-center" >
                    <div class="card-header black white-text">
                        Reset Password
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="email" class="control-label">E-mail</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5 right">
                                    <div class="form-group">
                                        <a class="login btn btn-default black" href="/">
                                            Send Password Reset Link
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!--/.Panel-->
            </div>

        </div>
    </div>
</div>
@endsection
