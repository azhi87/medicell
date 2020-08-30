@if(Session::has('message'))
<br><br><br>
 <div class="row">
 <div class="col-md-3"></div>
	<div class="alert alert-success alert-dismissable col-md-4" role="alert">
		 <button type="button" class="close hidden-print" data-dismiss="alert" aria-label="Close">
		     <span aria-hidden="true">&times;</span></button>
		<ul class="text-center">
			<li>{{session('message')}}</li>
		</ul>
	</div>
</div>
@endif
