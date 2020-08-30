@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<div class="container-fluid well">
 @if(Auth::user()->type=='admin')
<div class="row hidden-print well">
		<form method="POST" action="/expenses/searchReason" >
		{{csrf_field()}}
		<div class="col-md-8">
					<div class="input-group has-warning">
					
					 {{--    <select type="text" class="form-control" name="user_id">
					    <option value="all">هەموو</option>
					    @foreach ($users as $user)
					    	<option value="{{$user->id}}">{{$user->name}}</option>
					    @endforeach
					    </select> --}}
					  
					    {{-- <span class="input-group-addon">کارمەند</span> --}}
						<span class="input-group-btn ">
			        <button class="btn btn-secondary btn-danger" type="submit"><b>!گەڕان</b></button>
			      </span>

					    <input type="date" name="end_date" class="form-control"/>
					    <span class="input-group-addon">بۆ</span>
					    <input type="date"  name="start_date" class="form-control" placeholder="End"/>
						<span class="input-group-addon">لە</span>
					</div>
					
		</form>
	</div>
</div>

				@if(isset($from) && isset($to))
					<div class="col-md-6 text-center">
<label class="text-center text-danger"><span class="color-black">بۆ بەرواری : </span>  {{$to}} </label> 
<label class="text-center text-danger"><span class="color-black">لە بەرواری: </span> {{$from}} </label> 		
					</div>
			    @endif

<hr>
@endif


<div class="row ">

 <div class="col-md-8 col-sm-12 col-xs-12 table-responsive">

<table class="table table-bordered table-striped table-responsive">
	<thead class="bg-info color-black">
		<tr class="text-center">
			<th class="hidden-print">گۆڕانکاری</th>
			<th>بەروار</th>
			<th>هۆکار</th>
			<th>بڕی پارە</th>
		</tr>
	</thead>

	<tbody>
	<?php if (isset($searchExpenses))
		{ 	
			$expenses=$searchExpenses;
			$update=1;
		}
		else {
			$update=0;
			}
		?>

		@foreach ($expenses as $expense)

			<tr class="">
	<td class="hidden-print"><a href="/expenses/edit/{{$expense->id}}"><span class="fa fa-edit fa-1x">
	</span></a></td>
				<td>{{$expense->created_at->format('Y-m-d')}}</td>
				<td>{{$expense->reason}}</td>
				<td>{{$expense->amount}}</span></td>
			</tr>
		@endforeach
	</tbody>
       
</table>

	 <p class="text-center h3 color-red"><b>کۆی مەسروفات  : {{number_format($expenses->sum('amount'))}}</b></p>


 @if ($expenses->has('links'))
 {{ $expenses->links('vendor.pagination.bootstrap-4') }}
 @endif
</div>
<div class="col-md-4 col-sm-6 col-xs-10 col-md-offset-0 col-sm-offset-6 hidden-print">
@include('layouts.errorMessages')
       <div class="panel panel-info">
                <div class="panel-heading text-center">
                <span class="color-black h3"><b>زیادکردنی خەرجیەکان</b></span>
                </div>
                    <div class="panel-body">
					<form class='text-right' method="POST" action="/expenses/store" id="addForm">
					{{csrf_field()}}
					<fieldset class="form-group has-warning">
					<label for="name">  بڕی پارە بەدینار</label>
					<div class="input-group">
					    <select type="text" name="currency"  class="form-control hidden" >
					    <option value="IQD">IQD</option>
					    {{-- <option value="$">$</option> --}}
					    </select>
					    <span class="input-group-addon">-</span>
					    
					    <input type="number"  min="0"   name="amount"
						 class="form-control" required/>
					</div>
					</fieldset>
					
						<fieldset class="form-group has-warning hidden">
					<label for="name">  جۆری خەرجی</label>
					<div class="input-group">
					    				    <span class="input-group-addon">-</span>

					    <select type="text" name="type"  class="form-control" >
					    <option value="0" selected>پارەی خەرجیەکان</option>
					    <option value="1">پارەی ڕۆیشتوو</option>
					    </select>
					</div>
					</fieldset>
					
					<fieldset class="form-group has-warning hidden">
					<label for="name">نرخی دۆلار</label>
					<div class="input-group">
					    <span class="input-group-addon">-</span>
					    <input type="text"   class="form-control"/>
					</div>
					</fieldset>

							<fieldset class="form-group has-warning">
							<label for="name">هۆکار</label>
							<textarea class="form-control" name="reason" required=""></textarea>
						</fieldset>
						<div class="form-group text-center">
						<button type="submit" class="btn btn-primary btn-lg btn3d"><b>تۆمارکردن</b></button>
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
  $('#expense').addClass('menu-top-active');
  });
 </script>

 @endsection