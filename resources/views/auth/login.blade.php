@extends('layouts.app')
@section('content')
<br>
<br>

   <div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-2 col-xs-2"></div>
        <div class="col-md-6 col-sm-10 col-xs-10" style="border-style: groove; padding: 30px;">
            <div class="panel panel-success">
                <div class="panel-heading text-center"><span class="h3"><strong>Login </strong></span></div>
                <br>
                <div class="panel-body ">
                    <form class="form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" placeholder="Email Address" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" placeholder="Password " type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn-lg btn-primary btn-block">
                                    <b><strong> Login </strong></b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection