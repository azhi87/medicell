@extends('layouts.master')
@section('content')

 <br>
 <br>
 <br>
 <br>

<div class="row">

 <div class="col-md-10 col-md-offset-1  col-sm-12 col-xs-12 table-responsive">

<table class="table table-bordered  table-responsive">
	<thead class="bg-info">
		<tr class="custom_centered">

			<th>Full Name </th>
			<th>Email</th>
			<th >Edit</th>
		</tr>
	</thead>

	<tbody>
	
		@foreach ($users as $user) 
			<tr class="text-center">
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td class="hidden-print">
					<a href="/users/edit/{{$user->id}}" class="btn btn-lg"><span class="fa fa-edit fa-1a"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
       
</table>
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