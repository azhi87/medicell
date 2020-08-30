@extends('layouts.master')
@section('content')
<br>
<br>
<br>

<div class="col-md-4 col-sm-3 col"></div>

<div class="col-md-5 col-sm-6 col-xs-6 hidden-print">
@include('layouts.errorMessages')
       <div class="panel panel-info color-black">

                <div class="panel-heading text-center">
                <span class="color-black h3"><b> گۆڕانکاری لە خەرجیەکان </b></span>
                </div>
                <div class="panel-body">
					<form class='text-right' method="POST" action="/expenses/store/{{$expense->id}}" id="addForm">
					{{csrf_field()}}
					
					<fieldset class="form-group has-warning">
					<label for="name">   بڕی پارە بە دینار</label>
					<div class="input-group">
					    <select type="text" name="currency"  class="form-control">
					    
					    <option value="$"></option>
					    </select>
					    <span class="input-group-addon has-warning">-</span>
					    <input type="text" value="{{$expense->amount}}" name="amount" 
						min="0" class="form-control" required/>
					</div>
					</fieldset>
	
					
									<fieldset class="form-group  has-warning hidden">
					<div class="input-group">
					    <select type="text" name="type" class="form-control" >

                        @if($expense->type=='0')
					    <option value="0" selected>پارەی خەرجیەکان</option>
					    <option value="1">پارەی ڕۆیشتوو</option>
                        @else					
					    <option value="1" selected>پارەی ڕۆیشتوو</option>
					    <option value="0" >پارەی خەرجیەکان</option>
					    @endif
					    </select>
						<span class="input-group-addon">جۆری خەرجی</span>
					</div>
					</fieldset>

						<fieldset class="form-group">
							<label for="name">هۆکار</label>
							<textarea class="form-control" name="reason" >{{$expense->reason}}</textarea>
						</fieldset>
						<div class="form-group text-center">
						<button type="submit" class="btn btn-primary btn-lg btn3d">تۆمارکردن</button>
						</div>
					</form>
					</div>
	</div>
@endsection


@section('afterFooter')
 <script type="text/javascript">
 	$(document).ready(function () {
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#exchange').addClass('menu-top-active');
  });
 </script>

 @endsection