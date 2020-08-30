@extends('layouts.master')
@section('content')
<style>
	.input-group-addon{color:black;background-color:#F0FFFF;min-width:110px;font-weight: bold}
</style>

<br/><br/><br/><br/>
<div class="row">
                <div class="col-md-2 col-lg-2 "></div>
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <!-- Form Elements -->
                   <div class="panel panel-primary">
                        <div class="panel-heading text-center" >
                        <span class='h3'><b>Search for Patients</b></span>
                        </div>
                    <div class="panel-body text-right">
                            
                        <form action='/patient/search' method='post' role="form">
                        			{{csrf_field()}}
                        				<div class="form-group input-group ">
                                            <span class="input-group-addon">Patient Code</span>
                                            <input type="text" name='patient_id' class="form-control " >
                                        </div>
                                        <div class="form-group input-group ">
                                            <span class="input-group-addon">Patient Name</span>
                                            <input type="text" name='name' class="form-control " >
                                        </div>
                                       
                                        <div class="form-group input-group ">
                                            <span class="input-group-addon">Phone number</span>
                                            <input type="text" name='tel' class="form-control " >
                                        </div>
                                       
                                       <div class="form-group input-group hidden ">
                                            <span class="input-group-addon">Diagnosis</span>
                                            <input type="text" name='diagnosis' class="form-control " >
                                        </div>
                           
                                        <div class="form-group input-group ">
                                            <span class="input-group-addon">From</span>
                                            <input type="date" name='from' class="form-control " >
                                        </div>
                                       <div class="form-group input-group ">
                                            <span class="input-group-addon">To</span>
                                            <input type="date" name='to' class="form-control " >
                                        </div>
                                        
                                         <div class="form-group text-center">
                                            <input type="submit" value="Search" class="btn-lg btn-info btn3d">
                                        </div>
                                    </form>
                                        </div>
                        </div>                                  
                                </div>
                            </div>

@endsection

@section('afterFooter')
 <script type="text/javascript">
    $(document).ready(function () {
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#sale').addClass('menu-top-active');
  });
 </script>

 @endsection