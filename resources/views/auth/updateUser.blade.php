@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-2 col-sm-2">
    </div>    
       <div class="col-md-8 col-sm-8">
            <div class="panel panel-success">
                <div class="panel-heading text-center"><span class="h3">Edit  </span></div>
                <br>
                <div class="panel-body">
                <br>
                    <form class="form-horizontal text-left" role="form" method="POST" action="/users/update/{{$user->id}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                             <label for="name" class="col-md-4 control-label">Full Name </label>                           
                            <div class="col-md-8 col-sm-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-8 col-sm-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password </label>
                            <div class="col-md-8 col-sm-8">
                                <input id="password" type="password" class="form-control" name="password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">  Confirm Passowrd</label>
                            <div class="col-md-8 col-sm-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-4">
                                <button type="submit" class="btn btn-lg btn-primary ">
                                 <b>   Save </b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('afterFooter')
 <script type="text/javascript">
    $(document).ready(function () {
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#user').addClass('menu-top-active');
  });
 </script>

 @endsection