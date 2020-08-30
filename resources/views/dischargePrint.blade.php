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
 opacity: 0.2;
 z-index: 99;
}

</style>
@section('content')

<!--main content start-->
	<section class="wrapper">
		<div class="">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">

      <img  class="visible-print" width="1165" src="{{asset('/public/images/am11.jpg')}}" alt=" Dr.Amanj">
        
     <div class="hidden">    
      <h2 class="text-center font-italic hi"><strong> AMANJ HASSAN ALI </strong></h1>
      <h2 class="text-center font-italic"><strong> MBChB, FIBMS </strong></h1>
      <h3 class="text-center font-italic"><strong> Fellow of Helsinki university Hospital for Vascular and Microneurosurgery </strong></h3>
      <h2 class="text-center font-italic"><strong> NEUROSURGEON </strong></h2>
      <h4 class="text-center font-italic"><strong> E-mail: amanjali5575@gmail.com </strong></h4>
      <h4 class="text-center font-italic"><strong> Tel. No. : +964-770-157-8640 </strong></h4>
    </div>
    
    <div class="for-watermark-div visible-print"> 
<img  class="visible-print" width="1165" src="{{asset('/public/images/logoRGB.jpg')}}" alt=" Dr.Amanj"></div>
    <div class="print-single">
<br>

    <h3 class="text-center font-italic"> <strong>DISCHARGE CARD </strong></h3>
    <br>
    <br>
    <br>
 <h3><strong>Full Name: {{$patient->patient->fname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h3>
<br>
<br>
 <h3 class="font-italic"><strong> Imaging: <input style="border:0; padding:0;" size="55" ></strong></h3>
<br>
 <h3 class="font-italic"><strong> Operation:<input style="border:0; padding:0;" size="55" ></strong></h3>
<br>
 <h3 class="font-italic"><strong>Postoperative:<input style="border:0; padding:0;" size="55" ></strong></h3>
<br>
 <h3 class="font-italic"><strong>Follow up: <input style="border:0; padding:0;" size="55" ></strong></h3>

<br>
<br>
<br>
<br>

</div>
      <img  class="visible-print" width="1165" src="{{asset('/public/images/am22.jpg')}}" alt=" Dr.Amanj">
        
<div class="hidden">
<h3 class="text-right font-italic"><strong> AMANJ HASSAN ALI </strong></h3>

<h3 class="text-right font-italic"><strong> MBChB, FIBMS </strong></h3>

<h3 class="text-right font-italic"><strong> NEUROSURGEON </strong></h3>
<br>                    

<hr>
<h5 class="text-center justify"> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; Address:Ibrahim Pasha, Shad Medical Building Ground floor, in front of Goizha preparatory school.</h5>
<h5 class="text-center justify"> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; Sulaimani, Kurdistan, Iraq,  &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    Tel No.  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  +964-771-1506167  &nbsp;  &nbsp;  &nbsp; :: &nbsp;  &nbsp;  &nbsp;  +964-771-150-6168</h5>
</div>

                        </div>
                </div>
            </div>
            </section>
            @endsection
@section('afterFooter')
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

});
</script>
@endsection