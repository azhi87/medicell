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
 <form class="cmxform form-horizontal" method="post" action="/patient/store" enctype="multipart/form-data" style="font-weight:bold;">
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
</label>

<label class="col-sm-3 control-label col-lg-2 col-lg-offset-3 bg-danger text-center hidden" for="inputSuccess">Case Status</label>
                        <div class="col-lg-3 hidden">
                            <select class="form-control m-bot15" name="status">
                            <option value="0" selected>Not completed</option>
                            <option value="1">Completed</option>
                            </select>
</div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <select name="patient_id" class="form-control select2" onchange="getPatientDetails();" id="select2" >
      <option selected="" value="0">Select a previously added patient</option>
      @foreach ($patients as $pt)
        <option value="{{$pt->id}}">{{$pt->fname}} -- {{$pt->phone}}</option>
      @endforeach
    </select>
  </div>
  </div>
  <br>

                <div class="form-group">
                        <label class=" col-lg-1 col-sm-1 col-sm- col-sm-3 control-label">FullName</label>
                                    <div class="col-lg-3 col-sm-4">
                        <input name="fname" type="text" class="form-control" required="required" id="fname">
                        <input name="visitation_id" type="hidden" value="0">
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
                            <select class="form-control m-bot15"  name="gender" id="gender">
                            <option value="female">Female</option>
                            <option value="male" selected>Male</option>
                                                        <option value="child">Child</option>

                            </select>
                          </div>

                        <label class="col-lg-2 col-md-2 col-sm-2 control-label">Referral Doctor</label>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <select class="form-control m-bot15" name="referral_dr">
                            <option value="0" selected> None </option>
                            @foreach($refferals as $rf)
                                <option value="{{$rf->id}}">{{$rf->name}}</option>
                            @endforeach
                            </select>
                        </div> 

                </div>
                
                <div class="form-group has-primary">                
                        <label class="col-lg-1 col-sm-1 control-label">Years</label>
                                    <div class="col-lg-1 col-sm-2">
                        <input name="years" type="text" class="form-control" required="required"  id="years">
                                    </div>
                          <label class="col-lg-1 col-sm-1 control-label">Months</label>
                          <div class="col-lg-1 col-sm-3">
                        <input name="months" type="text" class="form-control" value="0" id="months">
                                    </div>

                        <label class="col-lg-1 col-sm-3 control-label">Phone</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="phone" type="text" class="form-control" id="phone"  >
                                    </div>  
                        </div>




                        <div class="form-group has-primary ">
                            
                        <label class="col-lg-1 col-sm-3 control-label">Discount%</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="discount_percentage" type="text" class="form-control" id="discount_percentage"  onkeyup="getSaleTotalPrice();" onblur="getSaleTotalPrice();">
                                    </div>  

                        <label class="col-lg-1 col-sm-3 control-label">Discount</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="discount" type="text" class="form-control" id="discount"  onkeyup="getSaleTotalPrice();" onblur="getSaleTotalPrice();">
                                    </div>  

                         <label class="col-lg-1 col-sm-3 control-label">Subtotal</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="totalBeforeDiscount" type="text" class="form-control" id="subtotal" readonly="" >
                                    </div>  


                        <label class="col-lg-1 col-sm-3 control-label">Total</label>
                                    <div class="col-lg-2 col-sm-3">
                        <input name="total" type="text" class="form-control" id="total"  readonly="">
                                    </div> 
                        </div>
                        
                        <div class="form-group has-primary">
                        <div class="col-lg-6 col-sm-6">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-secondary btn-info" onclick="addSpecialRows('urine')">Urine</button>
                              <button type="button" class="btn btn-secondary btn-danger" onclick="addSpecialRows('Stool')">Stool</button>
                              <button type="button" class="btn btn-secondary btn-success" onclick="addSpecialRows('SFA')">SFA</button>
                        </div> 
                        </div> 
                       


                        <div class="form-group has-primary hidden">
                        <label class="col-lg-1 col-md-1 col-sm-2 control-label">Address</label>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <input name="address" type="text" class="form-control" >
                                    </div> 
                                    </div>
    <select class="hidden" id="allItems" >
                          @foreach ($maintests as $maintest)
                      @foreach ($maintest->subtests as $subtest)
                            <option data-normal_range="{{$subtest->normal_range}}" data-sale_price="{{$subtest->sale_price}}" class="text-primary" value="{{$subtest->id}}" >{{$subtest->name}}</option>
                        @endforeach
                          @endforeach
    </select>
                            <div class="form-group has-primary ">    
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="panel-box panel-default">
          <div>
            <div class="table-responsive">
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
                  <tr id="test">
                      <td >
                            <select col="1" class="select2 col-lg-9 col-sm-9  text-primary subtests" name="subtests[0]">
                                <option></option>
                          @foreach ($maintests as $maintest)
                      @foreach ($maintest->subtests as $subtest)
                            <option data-normal_range="{{$subtest->normal_range}}" data-sale_price="{{$subtest->sale_price}}" class="text-primary" value="{{$subtest->id}}" >{{$subtest->name}}</option>
                        @endforeach
                          @endforeach
                      </select>
                      </td>
                      <td><input type="text" class="form-control" name="result[0]"></td>

                      <td class="sale_price"><span></span></td>
                      <td class="normal_range"><span></span></td>

                      <td class="hidden">
                          
                        <label class="radio-inline">
                        <input type="radio" name="negative[0]" value="normal" checked>N
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="negative[0]" value="H">H
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="negative[0]" value="L">L
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="negative[0]" value="-">-
                      </label>
                      </td>
                      <td><button type="button" class="btn btn-success btn-circle" onclick="addRow()"><i class="fa fa-plus" ></i></button></td>
                  </tr>
                <tbody>
              </table>
              <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-4">
              <button type="button" class="btn btn-lg btn-success btn-circle" onclick="addRow()"><i class="fa fa-plus"></i>Add Test</button>
              <input type="hidden" value="0" id="howManyItems">
              <button type="submit" class="btn btn btn-lg btn-primary">Submit</button>
                         
 
            </div>
            </div>
                </div>
                </div>
                </div>
        </div>                 
            </div>
      </form>                
  </section>                       
                </div>
            </div>
            @endsection
@section('afterFooter')
<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
    $(".js-example-rtl").select2({
  dir: "rtl"
});

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