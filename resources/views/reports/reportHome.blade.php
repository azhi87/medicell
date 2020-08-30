
@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row ">

<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                  <span class='h3 color-black'>  ژمارەی تێستەکان</span>
                </div>
                <div class="panel-body text-right">
<form method="POST" action="/reports/subtestTotal" id="contact_form">
	{{csrf_field()}}
				<fieldset class="form-group">
					<label for="id">لە بەرواری</label>
					<input type="date" class="form-control" name="from" >
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">بۆ بەرواری</label>
					<input type="date" name="to"  class="form-control" required>
				</fieldset>
		<div class="form-group">
		<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn3d btn-block"><strong>گەڕان</strong></button>
		</div>
		</div>
</form>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                  <span class='h3 color-black'>پارەی هاتوو</span>
                </div>
                <div class="panel-body text-right">
<form method="POST" action="/reports/income" id="contact_form">
	{{csrf_field()}}
				<fieldset class="form-group">
					<label for="id">لە بەرواری</label>
					<input type="date" class="form-control" name="from" >
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">بۆ بەرواری</label>
					<input type="date" name="to"  class="form-control" required>
				</fieldset>
		<div class="form-group">
		<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn3d btn-block"><strong>گەڕان</strong></button>
		</div>
		</div>
</form>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                  <span class='h3 color-black'>ڕاپۆرتی گشتی پارە </span>
                </div>
                <div class="panel-body text-right">
<form method="POST" action="/reports/allProfit" id="contact_form">

	{{csrf_field()}}
				

				<fieldset class="form-group">
					<label for="id">لە بەرواری</label>
					<input type="date" class="form-control" name="from" required>
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">بۆ بەرواری</label>
					<input type="date"  class="form-control" name="to" required>
				</fieldset>
		<div class="form-group">
		<div class="col-md-12">
	<button type="submit" name="boxes" class="btn btn-primary btn-block btn3d"><strong> گەڕان</strong></button>
		</div>
		</div>
</form>
</div>
</div>
</div>

<div class="row">
    @if(Auth::user()->type=='admin')
<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                 <span class='h3 color-black'> ڕاپۆرتی مەوادی مەخزەن </span>
                </div>
                <div class="panel-body text-right">

<a type="button" href='/reports/stockValuation' class=" btn btn-primary btn-block btn3d"><strong>گەڕان</strong></a>
		</div>
</div>
</div>

{{-- ***********************************************************************
 --}}

<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                 <span class='h3 color-black'> ڕاپۆرتی پارە - دۆلار</span>
                </div>
                <div class="panel-body text-right">

<a type="button" href='/reports/money' class=" btn btn-primary btn-block btn3d"><strong>گەڕان</strong></a>
		</div>
		

</div>
</div>

{{-- ***********************************************************************
 --}}


<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                 <span class='h3 color-black'>ڕاپۆرتی  پارە - بەروار</span>
                </div>
                <div class="panel-body text-right">
<form method="POST" action="/reports/profit" id="contact_form">
	{{csrf_field()}}
				
				<fieldset class="form-group">
					<label for="id">لە بەرواری</label>
					<input type="date" class="form-control" name="from" required>
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">بۆ بەرواری</label>
					<input type="date"  class="form-control" name="to" required>
				</fieldset>
		<div class="form-group">
		<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn3d btn-block"><strong>گەڕان</strong></button>
		</div>
		</div>
</form>
</div>
</div>
</div>

{{-- ***********************************************************************
 --}}
 {{-- ***********************************************************************
 --}}

<div class="col-md-3 col-sm-6 col-xs-10">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                 <span class='h3 color-black'>مەوادی ئێکسپایەر</span>
                </div>
                <div class="panel-body text-right">
<form method="POST" action="/stock/expiry" id="contact_form">
	{{csrf_field()}}
				
				<fieldset class="form-group">
					<label for="id">لە بەرواری</label>
					<input type="date" class="form-control" name="date" required>
				</fieldset>
				
		<div class="form-group">
		<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn3d btn-block"><strong>گەڕان</strong></button>
		</div>
		</div>
</form>
</div>
</div>
</div>
 @endif 

</div>	     


 @endsection
@section('afterFooter')
 <script type="text/javascript">
 	$(document).ready(function () {
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#report').addClass('menu-top-active');
  });
 </script>

 @endsection

 @section('afterFooter')
 <script type="text/javascript">
    $(document).ready(function () {
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#report').addClass('menu-top-active');
  });
 </script>

 @endsection


