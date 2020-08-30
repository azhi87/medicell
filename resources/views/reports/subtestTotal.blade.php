@extends('layouts.master')
@section('content')

<div class=" row row-print bordered-2 text-center">
<div class="hidden-print">
<br/>
<br/>
</div>
<br/>
<p class="h1"><strong>  ڕاپۆرتی تێستەکان</strong></p> 
    <br/>
</div>

<div class="row col-md-6 col-md-offset-4" >

    <table class="table table-borderless tfs14bold tfs14boldp">
    <tbody  class="text-center">
      <tr>
            <td class="col-md-2 col-print-3  text-right" class="bordersolid"><strong> {{$to}}</strong></td>
            <td class="col-md-2 col-print-2  text-left" class="backcsilver"><strong>: بۆ بەرواری </strong></td> 
            <td class="col-md-2 col-print-3  text-right" class="bordersolid"><strong> {{$from}}</strong></td>
            <td class="col-md-2 col-print-2  text-left" class="backcsilver"><strong>: لە بەرواری </strong></td>
            <td class="col-print-1"></td> 
      </tr>
    </tbody>
</table>

</div>
<div class="row bordered-1 text-center col-md-8 col-md-offset-2">

        <table class="table table-bordered table-text-center tfs14bold tfs12boldp">
    <thead class="bg-info text-center">

        <tr class="custom_centered">
            <th class="">  ژمارەی تێستەکان</th>
            <th class="">ناوی تێست</th>
             <th>#</th>
        </tr>

    </thead>
    <tbody>
<?php $i=1;?>

@foreach ($tests as $test)
    <tr class="custom_centered">
        <td class=" ">{{$test->total}}</td>
        <td class=" ">@php echo (\App\Subtest::find($test->subtest_id)->name); @endphp</td>
        <td>{{$i++}}</td>
    </tr>   
@endforeach

</table>
</div>



<div class="row row1px text-center col-md-8 col-md-offset-2">
        <table class="table table-borderless table-text-center text-center tfs18bold tfs18boldp">
        <tbody  class="text-center">
              
        
                <tr>
                    <td ></td>
                    <td class="borderfred  borderfred"><strong>{{number_format($tests->sum('total'))}}</strong></td>
                                <td class="col-print-3  col-md-3 backcsilver"><strong> :   سەرجەم  </strong> </td>
                    <td></td>
                </tr>
            </tbody>
    </table>
</div>

@endsection

@section('afterFooter')
 <script type="text/javascript">
    $(document).ready(function () {
  $("#menu-top li a").removeClass("menu-top-active");              
  $('#report').addClass('menu-top-active');
  });
 </script>

 @endsection