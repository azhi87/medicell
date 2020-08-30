@extends('layouts.master')
@section('links')
@section('content')
<div  style="padding-top: 50px;"></div>


<div class="col-md-3 col-sm-3 col-xs-10 hidden">

	<form method="POST" action="/cats/add">
{{csrf_field()}}
	<div class="input-group has-warning">
      <span class="input-group-btn">
        <button class="btn btn-secondary btn-danger" type="submit"><b>!زیادکردن</b></button>
      </span>
      <input type="text" name="cat" class="form-control" placeholder="...زیادکردنی جۆری مەواد">
      </div>
	</form>
    </div>

 </div>
 <br>
 <div class="row panel">
 
<div class="col-lg-6 col-lg-offset-3 hidden-print">
@include('layouts.errorMessages')
       <div class=" panel-primary h4">
                <div class="panel-heading text-center">
                  <span class="h4 bg-primary"><b>Edit Main Test</b></span>
                </div>
                <div class="panel-body">
		
			<form  method="POST" action="/maintest/store/{{$mt->id}}"  id="addForm">
			{{csrf_field()}}
			<fieldset class="form-group hidden" >
					<label for="id">Code</label>
			<input type="text" class="form-control" name="code" value="{{$mt->code}}" >
				</fieldset>

				<fieldset class="form-group">
					<label for="name">Test Name</label>
			<textarea rows="4" cols="50" type="text" class="form-control" name="name"  required>{{$mt->name}}</textarea>
			</fieldset>

			<fieldset class="form-group" >
							<label for="name"> Description</label>
				<textarea rows="4" cols="50" class="form-control" name="description" >{{$mt->description}}</textarea>
			</fieldset>

				<button type="submit" class="btn btn-lg btn-primary btn3d btn-block"><b>Save</b></button>
			</form>
	</div>
</div>

</div>


</div>
@endsection('content')
@stop
 
 @section('afterFooter')

 

 <script type="text/javascript">
 $(document).ready(function () {
    $('.select2').select2();
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#items/add').addClass('menu-top-active');
  });
 </script>
 
 @endsection