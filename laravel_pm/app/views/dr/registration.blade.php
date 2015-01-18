@extends('...layouts.sitepage')
@section('content')
    <div class="main-container container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h3 class="page-header">Registration Form</h3>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-offset-3 col-md-6">
                <form role="form"  action="{{SR::$baseUrl}}dr/register" method="post">
                    <div class="well well-sm">
                        <strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{Input::old("name")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control"  name="email" placeholder="Enter Email" value="{{Input::old("email")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{Input::old("phone")}}">
                        @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <div class="input-group">
                            <textarea name="address" class="form-control" rows="5">{{Input::old("address")}}</textarea>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Education</label>
                        <div class="input-group">
                            <textarea name="education" class="form-control" rows="5">{{Input::old("education")}}</textarea>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('education')) <p class="help-block">{{ $errors->first('education') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <input type="text" class="form-control"  name="username" placeholder="Username" value="{{Input::old("username")}}">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control"  name="password" placeholder="Password" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control"  name="confirm_password" placeholder="Retype Password" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        @if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
                    </div>
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default btn-lg pull-right">
                </form>
            </div>
        </div>
    </div>

@stop