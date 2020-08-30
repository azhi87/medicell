@extends('layouts.master')
@section('links')
@section('content')
<div  style="padding-top: 50px;"></div>

  {{--
<div class="row hidden-print well" >

		<div class="col-md-7 col-sm-6 col-xs-10 hidden-print">
    <form method="post" action="/items/search" class="form-inline text-center">
    {{csrf_field()}}

            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-1">                            
                <select name="id" class="select2" id="select2" style="min-width: 400px;" >
                    <option value="0">گەڕان بۆ ناوی مەواد</option>
               @foreach ($items_all as $item1)
                    <option value="{{$item1->id}}">{{$item1->id}}--{{$item1->name}}</option>
                @endforeach
            </select>
               
            </div>
            
    <div class="col-md-3 input-group-btn">
       <button class="btn btn-magick btn3d btn3d-pull" type="submit"> <strong>گەڕان </strong><span class="fa fa-search fa-1x"></span></button>
    </div>
    </form>
</div>
 --}}
 
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
 
<div class="col-lg-3 hidden-print">
@include('layouts.errorMessages')
       <div class=" panel-primary h4">
                <div class="panel-heading text-center">
                  <span class="h4 bg-primary"><b>Add New Doctor</b></span>
                </div>
                <div class="panel-body">
		
			<form  method="POST" action="/refferal/store" enctype="multipart/form-data" id="addForm">
			{{csrf_field()}}
			<fieldset class="form-group hidden" >
					<label for="id">Code</label>
			<input type="text" class="form-control" name="id" >
				</fieldset>

				<fieldset class="form-group">
					<label for="name">Doctor Name</label>
			<textarea rows="6" cols="100" type="text" class="form-control" name="name" required></textarea>
			</fieldset>

				<button type="submit" class="btn btn-lg btn-primary btn3d btn-block"><b>Save</b></button>
			</form>
	</div>
</div>

</div>

<div class="col-lg-9 col-sm-12 col-xs-12 table-responsive">
<table class="table table-bordered table-striped table-bordered table-responsive h4">
    <thead class="bg-primary color-black">
    		<tr class="custom_centered color-black">
            <th>Name </th>
            <th class="hidden-print">Edit</th>
    		</tr>
    </thead>
    <tbody>
        @foreach($res->sortbydesc('created_at') as $re)
    			<tr class="text-center">
    		<td>{{$re->name}}</td>
            <td class="hidden-print"><a href={{"/refferal/edit/".$re->id}}><span class="fa fa-edit fa-1x"></span></a></td>
    			</tr>
    	@endforeach
    </tbody>
</table>
<div class="hidden-print">
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