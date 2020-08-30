@extends('layouts.master')
@section('links')
@endsection
@section('content')
@php $visitation=new \App\Visitation();@endphp	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-3">
				    <br>
					<div class="col-md-4 market-update-right">
					<a href="/patient"><i class="fas fa-user-plus fa-5x"></i></a>
					</div>
					 <div class="col-md-8 market-update-left">
					</div>
					<div class="clearfix"> </div>
					<a href="/patient">	<h4 class="text-right"> New Test</h4></a>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-2">
				    <br>
					<div class="col-md-4 market-update-right">
					<a href="\patients\today" ><i class="fas fa-users fa-5x" ></i></a>
					</div>
				  <div class="clearfix"> </div>
					<a href="\patients\today">	<h4 class="text-right">Today's Test</h4></a>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-1">
    			    <br>
					<div class="col-md-4 market-update-right">	
					<a href="\patient\search">	<i class="fas fa-search fa-5x"></i>
					</div>
				<div class="clearfix"> </div>
					<a href="\patient\search"><h4 class="text-right">Search Test</h4> </a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-4">
				    <br>
					<div class="col-md-4 market-update-right">
					<a href="\subtests">	
					<i class="fas fa-prescription-bottle-alt fa-5x"></i>
					</div>
					<div class="clearfix"> </div>
					<a href="\subtests">	<h4 class="text-right">Add New Tests</h4></a>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
	
		<div class="market-updates">
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-3">
				    <br>
					<div class="col-md-4 market-update-right">
					<a href="\refferal">	
					<i class="fa fa-h-square fa-5x"></i>
					</div>
					<div class="clearfix"> </div>
					<a href="\refferal">	<h4 class="text-right">Add New Referral Doctors</h4></a>
				</div>
			</div>
		
@if(Auth::user()->type=="doctor")
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-2">
				    <br>
					<div class="col-md-4 market-update-right">
					<a href="\expenses">	
					<i class="fas fa-money-check fa-5x"></i>
					</div>
					<div class="clearfix"> </div>
					<a href="\expenses">	<h4 class="text-right">Add Expense</h4></a>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-1">
						<div class="col-md-4 market-update-right">
					<a href="\">	
					<i class="fas fa-calendar-day fa-5x"></i>
					</div>
					<div class="clearfix"> </div>
					<h4 class="text-left">Income money:<span style="color: black;">{{number_format($visitation->totalToday())}} IQD </span></h4>
					<h4 class="text-left">Patients Count:<span style="color: black;">{{$visitation->countToday()}} </span></h4>
				</div>
			</div>

			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 market-update-gd">
				<div class="market-update-block clr-block-4">
				    <br>
					<div class="col-md-4 market-update-right">
					<a href="\reports">	
					<i class="fas fa-arrows-alt fa-5x"></i>
					</div>
					<div class="clearfix"> </div>
					<a href="\reports">	<h4 class="text-right"> Reports by Dates</h4></a>
				</div>
			</div>
@endif
			</div>
			<div class="clearfix"> </div>
			</div>
			<!-- //market-->
		<!-- //tasks -->
</section>
 <!-- footer -->
		  <div class="footer" style="background-color: #2F4F4F";>
			<div class="">
			  <h5 style="color: #FFFFFF;"> Developed By TechSaz Group For IT Solutions - Tel: 07701941599 :: 07501941599  --- Website:
			  <a  href="https://techsaz.net" target="_blank">  www.Techsaz.net </a></h5>		</h4>
			@if(Auth::user()->type=='doctor')
			<a href="\users"><h5>Show Users</h5></i>
			@endif	

			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>

@endsection
