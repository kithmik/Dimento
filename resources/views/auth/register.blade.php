@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <!--Panel-->
                <div class="card  text-center" >
                    <div class="card-header black white-text">
                        Register
                    </div>
                    <div class="card-body">

                        @foreach($errors->all() as $error)
                            {{ $error }}

                        @endforeach

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{--first name--}}
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="first_name" class="control-label">First Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--last name--}}
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="last_name" class="control-label">Last Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required >

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--profile pic--}}
                            {{--<div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="phone" class="control-label">Profile Picture</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="btn black btn-sm">
                                            <span>Choose file</span>
                                            <input name="profile_pic" type="file">
                                        </div>
                                    </div>

                                </div>
                            </div>--}}

                            {{--phone--}}
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="phone" class="control-label">Telephone</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="phone" type="number" name="phone" value="{{ old('phone') }}" >

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--dob--}}
                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="dob" class="control-label">Date of Birth</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control datepicker" id="dob" name="dob" value="{{ old('dob') }}">

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--type--}}
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="type" class="control-label">Type</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="type" id="type" class="mdb-select" required>
                                            <option value="" disabled selected>Choose your type </option>
                                            <option value="1">3D Model Designer</option>
                                            <option value="2">Customer</option>
                                            <option value="3">Business</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{--email--}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="email" class="control-label">Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--password--}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="password" class=" control-label">Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="password" type="password" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--confirm password--}}
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="password2" class=" control-label">Confirm Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="password_confirmation" type="password" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-sm-3 col-xs-1"></div>
                                <div class="col-sm-6 col-xs-1">
                                    <div class="form-group">
                                        <button type="submit" class="login btn btn-default black">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
                <!--/.Panel-->
            </div>
        </div>
    </div>
@endsection
