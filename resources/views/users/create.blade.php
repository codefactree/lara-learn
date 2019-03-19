@extends('master') 
@section('content')
<div class="col-md-6 col-md-offset-3">
    <form action="{{route('user.store')}}" method="POST" class="form-horizontal" role="form" autocomplete="off">
        @csrf
        <h2>Registration Form</h2>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-9">
                <input type="text" id="name" name="name" placeholder="Full Name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                autofocus> 
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> 
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="email" id="email" name="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> 
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> 
                @endif
            </div>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    </form>
    <!-- /form -->
</div>
@endsection