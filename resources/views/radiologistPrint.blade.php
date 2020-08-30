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
                    
      <img  class="visible-print" width="1165" src="{{asset('/public/images/asrah.jpg')}}" alt=" Dr.Asra">
        
<br>
    <div class="for-watermark-div hidden-print hidden"> 
<img  class="hidden-print hidden" width="1165" src="{{asset('/public/images/logoRGB.jpg')}}" alt=" Dr.Asra"></div>
    <div class="print-single">

<h5 class="text-right"><strong>{{now()->toDateString('d-m-y') }}</strong></h5>

<br>
  <h3>Dear Dr.<strong> Radiologist </strong></h3>

<br>
<br>

 <h3 style="padding-left: 50px;"> Kindly arrange </h3> 
 <h3> <strong><input style="border:0; padding:0;" size="55"></strong></h3>
 <h3>for this patient <strong>{{$patient->patient->fname}} </strong> whose <strong>{{$patient->patient->age}} years </strong> old
 {{$patient->patient->gender}}, </h3>
 <h3><strong> <input style="border:0; padding:0;" size="55" ></strong></h3>
 <h3><strong> <input style="border:0; padding:0;" size="55" ></strong></h3>
 <h3><strong> <input style="border:0; padding:0;" size="55" ></strong></h3>


<br>                    
<br>                    

<br>                    
<br>    
<br>                    
<br>    

<h3 style="padding-left: 50px;"> Best Regards...</h3>

<br>                    
<br>                    
<br>                    

<br>                    
</div>

      <img  class="visible-print" width="1165" src="{{asset('/public/images/esraf.jpg')}}" alt=" Dr.Asra">

<div class="hidden">
<h3 class="text-right font-italic"><strong> AMANJ HASSAN ALI </strong></h3>
<h3 class="text-right font-italic"><strong> MBChB, FIBMS </strong></h3>
<h3 class="text-right font-italic"><strong> NEUROSURGEON </strong></h3>
<br>                    
<br>                    
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