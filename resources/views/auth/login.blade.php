@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 100px">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <!--Panel-->
                <div class="card  text-center" >
                    <div class="card-header black white-text">
                        Login
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
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

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="password" class=" control-label">Password</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="password" type="password" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox" class="grey-text">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-elegant waves-effect btn-md">
                                            Login
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-outline-elegant waves-effect btn-md">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 right">
                                    <div class="form-group">
                                        <a class="" href="{{ route('password.request') }}">
                                            Forgot Your Password?
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


@endsection
