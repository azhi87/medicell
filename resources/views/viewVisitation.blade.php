@extends('layouts.master')
@section('content')
           
<br>
<br>
<br>

<!--main content start-->

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
<div class="table-responsive">

  <div class="form-group has-primary">
<button type="button" class="btn btn-lg btn-primary hidden-print" id="print">print</button>
<a type="button" class="btn btn-lg btn-primary hidden-print" href="/visitation/edit/{{$visitation->id}}/{{$visitation->patient->id}}">edit</a>

<div class="panel panel-default hidden-print">
    <div class="panel-heading h5">
    <strong> Attached Files </strong>
    </div>
      <table class="table h5 table-responive">
        <thead>
          <tr>
            <th>Test/Results - New </th>
            <th>Patient CV - Old</th>
          </tr>
        </thead>
        <tbody>
          <tr data-expanded="true">
                <td>
                @foreach ($visitation->patient->images as $im)
                  <a href="{{$im->url}}" target="_blank"><span class="h3"><strong>{{$loop->iteration}}</strong></span></a> |
                 @endforeach
                </td>
                <td>
                   @foreach ($visitation->patient->patientCVs as $im)
                     <a href="{{$im->url}}" target="_blank"><span class="h3"><strong>{{$loop->iteration}}</strong></span></a> |
                 @endforeach
                </td>
          </tr>    
          <tbody>
        </table>
          </div>
    

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"> <strong> Information</strong></div>
    <!-- Table -->
    <table class="table table-responive">
            <tr>
                <th>Patient Id: <span class="text-info">{{$visitation->patient->id}}</span></th>
                <th>Name: <span class="text-info">{{$visitation->patient->fname}}</span></th>
                <th>Gender: <span class="text-info">{{$visitation->patient->gender}}</span></th>
            </tr>
            <tr>
                <th>Married Name : <span class="text-info">{{$visitation->patient->married_name}}</span></th>
                <th>Occupation: <span class="text-info">{{$visitation->patient->occ->name}}</span></th>
                <th>Occupatin Married: <span class="text-info">{{$visitation->patient->occ->name}}</span></th>
            </tr>
            <tr>
                <th>Blood Group: <span class="text-info">{{$visitation->patient->blood_group}}</span></th>
                <th>Status: <span class="text-info">{{$visitation->patient->marital_status}}</span></th>
                <th>Date: <span class="text-info">{{$visitation->created_at}}</span></th>
                 </tr>
            <tr>
                 <th>Age: <span class="text-info">{{$visitation->patient->age}}</span></th>
                <th>phone: <span class="text-info">{{$visitation->patient->phone}}</span></th>
                <th>address: <span class="text-info">{{$visitation->patient->address}}</span></th>
            </tr>
             <tr>
                <th class="bg-warning"><p>History (Chief Complaint)</p></td>
                <th colspan="4"><p class="text-info text-left">{{$visitation->di->chief_complain}}</p></th>
            </tr>
            <tr>
                <th class="bg-warning"><p>Diagnosis (Details)</p></td>
                 <th colspan="4"><p class="text-info text-left">{{$visitation->di->diagnosis}}</p></th>
            </tr>


            <tr>
             <th class="bg-warning"><p >Plan (Follow up)</p></th>
            <th colspan="4" ><p class="text-info text-left">{{$visitation->te->tr_follow_up}}</p></th>
          </tr>

        </tbody>
    </table>
</div>


<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><strong>Investigation</strong></div>
    <table class="table table-bordered table-responive table-active">
        <tbody>
            <tr>
                @foreach ($visitation->subtests as $subtest)
                <td>
                    <input type="checkbox" class="checkbox-inline" checked="" readonly="">
                    <span class="text-center">{{$subtest->name}}</span></td>
                @if($loop->iteration%5==0)
                </tr>
                <tr>

                @endif
                 @endforeach
            </tr>
            <tr class="hidden">
                <th colspan="1" class="bg-warning"><p class="text-right">Radiologist Description</p></th>
                <td colspan="4"><p class="text-left">{{$visitation->te->tr_radiologically}}</p></td>
            </tr>
           
        </tbody>
    </table>
</div>
           
 <div class="panel panel-default">
    <div class="panel-heading">
    <strong> Treatment Table </strong>
    </div>
      <table class="table table-responive">
        <thead>
          <tr>
            <th>No.</th>
            <th>Drug Name</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($visitation->treatments as $tr)
          <tr data-expanded="true">
          <td class="">{{$loop->iteration}}</td>

            <td>{{$tr->tr_name}}</td>
            <td>{{$tr->tr_description}}</td>
          </tr>
          @endforeach
      </tbody>
 
    <tbody>
          <tr class="hidden">
            <th class="bg-warning col-md-2" colspan="1"><p class="text-right">Surgical</p></th>
            <td class="col-md-8"><p class="text-left">{{$visitation->te->tr_surgical}}</p></td>
          </tr>
          <tbody>
  </table>
          </div>

          </div>
          </div>
          </div>  
       </div>  
            @endsection
@section('afterFooter')
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

});
$("#print").click(function(){
    window.print();
});
</script>
@endsection