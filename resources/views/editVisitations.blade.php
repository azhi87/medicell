@extends('layouts.master')
@section('content')
<br>
<br>
<br>

            <div class="row" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <section style="border: 2px solid ! important; padding-left: 20px; 
    padding-right: 20px ;
    margin-left: 20px ! important;
    margin-right: 20px ! important;">
 <form class="cmxform form-horizontal" method="post" action="/patient/store" novalidate="novalidate" enctype="multipart/form-data" style="font-weight:bold;">
    {{csrf_field()}}

@if(count($errors))
    <div class="row">
    <div class='alert alert-danger'>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    </div>
@endif
<div class="form-group has-primary" >
<label for="ccomment" class="control-label col-lg-3 bg-primary h3">Patient Information</label>
     <label class="label label-danger">
    <a href="#" class="primary btn-lg"  data-toggle="modal" data-target="#confirm-delete">Delete</a>
</label>

<label class="col-sm-3 control-label col-lg-2 col-lg-offset-3 bg-danger text-center hidden" for="inputSuccess">Case Status</label>
                        <div class="col-lg-3 hidden">
                           
</div>
</div>
<br>

                <div class="form-group">
                        <input type="hidden" name="patient_id" value="{{$visitation->patient->id}}">
                        <input type="hidden" name="visitation_id" value="{{$visitation->id}}">
                        <label class=" col-lg-1 col-sm-1 col-sm- col-sm-3 control-label">FullName</label>
                                    <div class="col-lg-3 col-sm-4">
                        <input name="fname" type="text" class="form-control" required="required" value="{{$visitation->patient->fname}}">
                                 </div>

                                 <label class="col-sm-1 control-label col-lg-1 hidden" for="inputSuccess">Status</label>
                        <div class="col-sm-2 col-lg-2 hidden">
                            <select class="form-control m-bot15" name="marital_status"  id="marital_status" required>
                            <option value="married" selected>Married </option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                            </select>
                        </div>


                         <label class=" col-sm-1 control-label col-lg-1" for="inputSuccess">Gender</label>
                        <div class="col-lg-2 col-sm-2">
                            <select class="form-control m-bot15"  name="gender">
                            <option value="{{$visitation->patient->gender}}" selected>{{$visitation->patient->gender}} </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="child">Child</option>
                            </select>
                        
                </div>
                
                     <label class="col-lg-2 col-md-2 col-sm-2 control-label">Referral Doctor</label>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <select class="form-control m-bot15" name="referral_dr">
                        <option value="{{count($visitation->refferal)>0?$visitation->refferal->id:'0'}}" selected>{{count($visitation->refferal)>0?$visitation->refferal->name:"None"}}</option>
                            @foreach($refferals as $rf)
                                <option value="{{$rf->id}}">{{$rf->name}}</option>
                            @endforeach
                            </select>
                        </div> 
                       
                   </div>
                
                <div class="form-group has-primary">                

                        <label class="col-lg-1 col-sm-1 control-label">Years</label>
                                    <div class="col-lg-1 col-sm-2">
                        <input name="years" type="text" class="form-control" required="required" placeholder="years" value="{{$visitation->patient->years}}">
                                    </div>
                          <label class="col-lg-1 col-sm-1 control-label">Months</label>
                          <div class="col-lg-1 col-sm-3">
                        <input name="months" type="text" class="form-control" value="{{$visitation->patient->months}}" >
                                    </div>

                        <label class="col-lg-1 col-sm-3 control-label">Phone</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="phone" type="text" value="{{$visitation->patient->phone}}" class="form-control">
                                    </div>

                                    </div>
                                  

                    <div class="form-group has-primary">
                    
                        <label class="col-lg-1 col-sm-3 control-label">Discount%</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="discount_percentage" type="text" value="{{$visitation->discount_percentage}}"  class="form-control" id="discount_percentage" 
                        onkeyup="getSaleTotalPrice();" onblur="getSaleTotalPrice();">
                                    </div>           
                    
                        <label class="col-lg-1 col-sm-3 control-label">Discount</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="discount" type="text" value="{{$visitation->discount}}"  class="form-control" id="discount" 
                        onkeyup="getSaleTotalPrice();" onblur="getSaleTotalPrice(); ">
                                    </div>           
                        
                        <label class="col-lg-1 col-sm-3 control-label">Subtotal </label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="totalBeforeDiscount" type="text" value="{{$visitation->totalBeforeDiscount}}" class="form-control" id="subtotal" readonly="" >
                                    </div>  
                                    
                        <label class="col-lg-1 col-sm-3 control-label">Total</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="total" type="text" value="{{$visitation->total}}" class="form-control" id="total" readonly="readonly">
                                    </div>  
    
                        </div>


    <select class="hidden" id="allItems" >
                          @foreach ($maintests as $maintest)
                      @foreach ($maintest->subtests as $subtest)
                            <option data-normal_range="{{$subtest->normal_range}}" data-sale_price="{{$subtest->sale_price}}" class="text-primary" value="{{$subtest->id}}" >{{$subtest->name}}</option>
                        @endforeach
                          @endforeach
    </select>
                        <div class="form-group has-primary hidden">

                        <label class="col-lg-1 col-md-1 col-sm-2 control-label">Address</label>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input name="address" type="text" class="form-control" >
                                    </div> 
                                    </div>
         
 <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="form-group has-primary ">    
    <div class="col-lg-12">
    <div class="panel-box panel-default">
    <div>
      <table class="table h6">
        <thead>
                <tr class="bg-info">
                  <th class="col-lg-3">Test Name</th>
                  <th class="col-lg-2">Result</th>
                  <th class="col-lg-1">Test Price</th>
                  <th class="col-lg-3">Normal Range</th>
                  <th class="col-lg-2 hidden">Negative?</th>
                  <th class="col-lg-1">Add/Remove</th>
                </tr>

        </thead>
        <tbody id="testBody">
             @foreach ($visitation->subtests as $tr)
            <tr id="{{$loop->index}}">
                <td>
                      <select  class=" text-primary subtests select2" name="subtests[{{$loop->index}}]">
                     @foreach ($maintests as $maintest)
                        @foreach ($maintest->subtests as $subtest)
                              @if($tr->id==$subtest->id)
                              <option class="text-primary" value="{{$subtest->id}}" selected="" data-normal_range="{{$subtest->normal_range}}" data-sale_price="{{$subtest->sale_price}}">{{$subtest->name}}</option>
                              @else
                              <option class="text-primary" value="{{$subtest->id}}" data-normal_range="{{$subtest->normal_range}}" data-sale_price="{{$subtest->sale_price}}">{{$subtest->name}}</option>
                              @endif
                        @endforeach
                    @endforeach
                </select>
                </td>
                <td><input type="text" class="form-control" name="result[{{$loop->index}}]" value="{{$tr->pivot->result}}"></td>
                <td class="sale_price">{{$tr->sale_price}}</td>
                <td><span>{{$tr->normal_range}}</span></td>
                
                <td class="hidden">
                    
                   <label class="radio-inline">
                    @if($tr->pivot->negative=='Normal')
                    <input type="radio" name="negative[{{$loop->index}}]" value="normal" checked="">N
                    @else
                    <input type="radio" name="negative[{{$loop->index}}]" value="normal">N
                  @endif
                    </label>

                   <label class="radio-inline">
                    @if($tr->pivot->negative=='H')
                  <input type="radio" name="negative[{{$loop->index}}]" value="H" checked="">H
                    @else
                  <input type="radio" name="negative[{{$loop->index}}]" value="H">H
                  @endif
                </label>

                 <label class="radio-inline">
                    @if($tr->pivot->negative=='L')
                     <input type="radio" name="negative[{{$loop->index}}]" value="L" checked="">L
                    @else
                     <input type="radio" name="negative[{{$loop->index}}]" value="L">L
                  @endif
                  </label>

                   <label class="radio-inline">
                    @if($tr->pivot->negative=='-')
                  <input type="radio" name="negative[{{$loop->index}}]" value="-" checked="">-
                    @else
                  <input type="radio" name="negative[{{$loop->index}}]" value="-">-
                  @endif
                </label>
                  
               
                </td>
                <td>
                    <button type="button" class="btn btn-success btn-circle" onclick="addRow()"><i class="fa fa-plus" ></i></button>
                    <button type="button" class="btn btn-danger btn-circle" onclick="removeRow({{$loop->index}});"><i class="fa fa-minus" ></i></button>
                </td>
            </tr>
            @endforeach
            <input type="hidden" value="{{$visitation->subtests->count()}}" id="howManyItems">
          <tbody>
        </table>
              <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-4">
              <button type="button" class="btn btn-lg btn-success btn-circle" onclick="addRow()"><i class="fa fa-plus"></i>Add Test</button>
              <button type="submit" class="btn btn btn-lg btn-primary">Submit</button>
 
            </div>
            </div>
            </div>
            </div>
            </div>
                </form>                
                </div>
        </section>
        </form>
                </div>
            </div>
       
            @endsection
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            Delete Visitation
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Visitation?
                This operation is irreversible..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/visitation/delete/{{$visitation->id}}" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
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
