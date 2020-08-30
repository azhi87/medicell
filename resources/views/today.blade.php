@extends('layouts.master')
@section('content')

<br/>
<br/>
<br/>

<div class="row hidden-print col-md-10 col-md-offset-1" >
		<div class="col-md-10 col-sm-12 col-xs-12 hidden-print well  col-md-offset-1" >
    <form class="form-horizontal" method="post" action="/patient/search">
      {{csrf_field()}}
      
    <div class="col-md-10 col-sm-9" >                            
    <select name="patient_id" class="form-control select2" onchange="getPatientDetails();" id="select2" >
      <option selected="" value="0">Select a previously added patient</option>
      @foreach ($spts as $spt)
        <option value="{{$spt->id}}">{{$spt->id}} -- {{$spt->fname}} -- {{$spt->phone}} </option>
      @endforeach
    </select>
    </div>
        <div class="col-md-2 col-sm-3 input-group-btn ">
       <button class="btn btn-lg btn-Primary" type="submit"><strong>گەڕان </strong><span class="fa fa-search fa2x"></span></button>
    </div>
    </form>
  </div>
</div>

<div class="row col-md-10 col-md-offset-1" >
<div class=" col-lg-12 col-sm-12 col-xs-12 col-md-12  well ">
   @foreach ($visitations as $visit)
   <br>
<div class="table-responsive" style="border: 2px solid DarkCyan ; background-color: Gainsboro; border-style: inset;">
    <table class="table table-bordered table-striped table-responsive table-text-center" >
    <thead >
        <tr style="background-color: #AFEEEE;" style="color: white;">
            <th>Patient ID</th>
            <th>Visit ID</th>
            <th>Patient name</th>
            <th>Phone</th>
            <th >Date </th>
        </tr>
    </thead>
   <tbody>
        <tr >
            <td>{{$visit->patient->id}}</td>
            <td>{{$visit->id}}</td>
            <td>{{$visit->patient->fname}}</td>
            <td>{{$visit->patient->phone}}</td>
            <td style="background-color: #F5DEB3;">{{$visit->created_at}}</td>
        </tr>
    </tbody>
    <thead >
        <tr style="background-color: #AFEEEE;" style="color: white;">
            <th>Total Before Discount</th>
            <th>Discount%</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Referral Doctor</th>
        </tr>
    </thead>
   <tbody>
        <tr >
            <td>{{$visit->totalBeforeDiscount}} </td>
            <td>{{$visit->discount_percentage}} %</td>
            <td>{{$visit->discount}}</td>
            <td>{{$visit->total}}</td>
            <td >{{count($visit->refferal)>0?$visit->refferal->name:""}}</td>
        </tr>
    </tbody>
  <table class="table table-bordered table-striped table-responsive ">
    <thead>
      <tr class="bg-">
        <th class="col-lg-2">Test Name</th>
        <th class="col-lg-2">Result</th>
        <th class="col-lg-4">Normal Range</th>
        <th class="col-lg-1 hidden">Negative</th>
      </tr>
      </thead>
  @foreach ($visit->subtests as $sbt)
    <tbody>
    <tr>
        <td>{{$sbt->name}}</td>
        <td>{{$sbt->pivot->result}}</td>
        <td>{{$sbt->normal_range}}</td>
        <td class="hidden">{{$sbt->pivot->negative}}</td>
    </tr>
    </tbody>
  @endforeach
</table>
<div class="col-lg-offset-8 col-md-offset-8">
    <a role="button" class="hidden" href="/visitation/delete/{{$visit->id}}" class="btn btn-lg btn-danger">Delete</a>
    <a role="button" href="/visitation/edit/{{$visit->id}}\{{$visit->patient->id}}" target="_blank" class="btn btn-lg btn-primary">Edit</a>
    <button role="button" onclick='printPage("/patient/investigationPrint/{{$visit->id}}")'  class="btn btn-lg btn-success hidden">Print</button>
    <a role="button" href="/patient/investigationPrint/{{$visit->id}}"  class="btn btn-lg btn-success" target="_blank">Print</a>

</div>
</div>
@endforeach
@endsection
</div>
</div>

@section('afterFooter')
<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
@endsection