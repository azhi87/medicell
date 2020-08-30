@extends('layouts.master')
@section('links')
@section('content')

       <img class="visible-print" width="1165" src="{{asset('/public/img/header.png')}}" alt="E-Lab">
        <div  style="padding-top: 80px;" class="hidden-print"></div></div>

 <div class="row panel">
<div class="col-lg-3 hidden-print">
@include('layouts.errorMessages')
       <div class="panel-info h5">
                <div class="panel-heading text-center">
                 <strong> Add Tests</strong>
                </div>
        <div class="panel-body">
			<form  method="POST" action="/subtest/store"  id="addForm">
			{{csrf_field()}}
			<fieldset class="form-group hidden" >
					<label for="id">Code</label>
			<input type="text" class="form-control" name="code" >
				</fieldset>
				<fieldset class="form-group">
					<label for="name">Test Name</label>
			<textarea rows="4" cols="50" type="text" class="form-control" name="name" required></textarea>
			</fieldset>
      <fieldset class="form-group" >
          <label for="id">Main Test</label>
      <select  class="form-control" name="maintest_id" >
        @foreach ($mts as $mt)
         <option value="{{$mt->id}}">{{$mt->name}}</option>
        @endforeach
      </select>
        </fieldset>
       <fieldset class="form-group" >
          <label for="id">Instrument</label>
      <input type="text" class="form-control" name="instrument" >
        </fieldset>
      <fieldset class="form-group" >
          <label for="id">Normal Range</label>
      <textarea rows="10" cols="50" type="text" class="form-control" name="normal_range" ></textarea>
        </fieldset>

        <fieldset class="form-group" >
          <label for="id">Unit</label>
      <input type="text" class="form-control" name="unit" >
        </fieldset>

        <fieldset class="form-group" >
          <label for="id">Test Price</label>
      <input type="number" class="form-control" min="0" name="sale_price" required value="0">
        </fieldset>

        <fieldset class="form-group" >
          <label for="id">Default Value</label>
      <input type="text" class="form-control" name="default_value">
        </fieldset>

		<fieldset class="form-group hidden-print" >
					<label for="name"> Description</label>
				<textarea rows="4" cols="50" class="form-control" name="description" ></textarea>
		</fieldset>
				<button type="submit" class="btn btn-lg btn-primary btn3d btn-block"><b>Save</b></button>
  <br>
  <a href="\maintests"><h4 class="btn btn-lg btn-info btn3d btn-block">Add Main Test</h4></a>
  <br>
  <a href="\specials"><h4 class="btn btn-lg btn-info btn3d btn-block">Urine, Stool, SFA tests</h4></a>
    </form>
	</div>
</div>
</div>

<div class="col-lg-9 col-sm-12 col-xs-12 table-responsive">
<table class="table table-bordered table-striped table-responsive h5">
	<thead class="bg-info">
		<tr class="">
        <th>Name </th>
        <th>Normal Range </th>
        <th>Main Test </th>
        <th>Test_Price </th>
        <th class="hidden-print">Edit</th>
		</tr>
	</thead>
	<tbody>
  @foreach($sts->sortbydesc('created_at') as $st)
			<tr class="text-center">
        <td>{{$st->name}}</td>
        <td>{{$st->normal_range}}</td>
        <td>{{$st->maintest->name}}</td>
        <td>{{number_format($st->sale_price)}}</td>
        <td class="hidden-print"><a href={{"/subtest/edit/".$st->id}}><span class="fa fa-edit fa-1x"></span></a></td>
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