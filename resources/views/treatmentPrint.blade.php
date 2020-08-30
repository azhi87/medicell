@extends('layouts.master')
<style>
    .font-italic
{
    font-style:italic !important;    
}
.underline
{
    text-decoration: underline !important;
}
.justify
{
    text-align: justify !important;
}
.print-single
{
    page-break-inside: avoid;
}

.for-watermark-div
{
 position: fixed;
 opacity: 0.1;
 z-index: 99;
}

</style>
@section('content')

<!--main content start-->
	<section class="wrapper">
<div class="col-lg-12">
      <img class="visible-print" width="1165" src="{{asset('/public/img/')}}" alt=" E-Lab">
<br>

     <h4><strong>Full Name: {{$patient->patient->fname}}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Date: {{now()->toDateString('d-m-y') }}     </strong> </h4> 
<br>

<button  class="hidden-print bg-primary btn-lg " onclick="myFunction()">Print this page</button><br>

<div class="form-group has-primary" style="min-height:500px;">    
<table class="table h3 table-borderd table-striped">
        <thead>
          <tr>
          <th>Drug Name</th>
          <th>Dos & Duration</th>
          </tr>
        </thead>
        <tbody>
        <?php $i=1;?>
        @foreach ($patient->treatments as $tr)
          <tr data-expanded="true" >
            <td style="text-align: left !important;">{{$tr->tr_name}}</td>
            <td>  <input style="border:none !important; height:40px !important; width:350px !important; font-size: 22px !important;"
                                                                                    type="text" class="form-control ">
          </tr>
          <?php $i++;?>
          @endforeach
</table>
          </div>

<br>  
<br>

      <img   class="visible-print" width="1165" src="{{asset('/public/img/')}}" alt=" E-Lab">
</div>
            </section>
            @endsection
@section('afterFooter')

<script>
function myFunction() {
  window.print();
}
</script>
@endsection