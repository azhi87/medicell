@extends('layouts.master')
@section('links')
@section('content')

       <img class="visible-print" width="1165" src="{{asset('/public/img/header.png')}}" alt="E-Lab">
        <div  style="padding-top: 80px;" class="hidden-print"></div></div>



<div class="col-lg-12 col-sm-12 col-xs-12 table-responsive">
<table class="table table-bordered table-striped table-responsive h4">
	<thead class="bg-info">
		<tr class="">
        <th class="hidden-print">SFA </th>
        <th>Stool</th>
        <th>Urine </th>
        <th>Main Test</th>
        <th>Test Name</th>
		</tr>
	</thead>
	<tbody>
    <form class="form" action="/specials/store" method="post">
      @csrf
      
  @foreach($sts->sortbydesc('created_at') as $st)
			<tr class="text-center">
        <td>
            @if($st->category()=='sfa')
                <input type="checkbox" checked="" name="sfa[]" value="{{$st->id}}">
            @else
                 <input type="checkbox" name="sfa[]" value="{{$st->id}}">
            @endif
        </td>

        <td>
            @if($st->category()=='stool')
                <input type="checkbox" checked="" name="stool[]" value="{{$st->id}}">
            @else
                 <input type="checkbox" name="stool[]" value="{{$st->id}}">
            @endif
        </td>

        <td>
            @if($st->category()=='urine')
                <input type="checkbox" checked="" name="urine[]" value="{{$st->id}}">
            @else
                 <input type="checkbox" name="urine[]" value="{{$st->id}}">
            @endif
        </td>

                    @if($st->category()=='urine')
                            <td style="background-color: #F5DEB3;">{{$st->maintest->name}}</td>
                    @elseif($st->category()=='stool')
                            <td style="background-color: #FFFACD;">{{$st->maintest->name}}</td>
                    @elseif($st->category()=='sfa')
                             <td style="background-color: #98FB98;">{{$st->maintest->name}}</td>
                    @else
                            <td>{{$st->maintest->name}}</td>
                    @endif
                    
        <td>{{$st->name}}</td>
      </tr>
	@endforeach
  <button type="submit" class="btn btn-lg btn-primary hidden-print">Submit</button>
</form>
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