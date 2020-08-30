@extends('layouts.master')
@section('content')

<div class="row bordered-1">

<div class="col-md-8 col-sm-8 col-md-offset-2">
<br>
<br>
<br>
<br>
<br>
        @if(isset($from) && isset($to))
                    <div class="col-md-6 text-center col-md-offset-3 h4">
                        <label class="text-center text-danger"><span class="color-black">بۆ بەرواری : </span>  {{$to}} </label> 
                        <label class="text-center text-danger"><span class="color-black">لە بەرواری: </span> {{$from}} </label>         
                    </div>
        @endif
<br>
<br>
<br>

        <table class="table text-center tseparate table-bordered tfs16boldc tfs14boldp margin-1">
        <tbody >
      
        <tr>
                <td class="text-danger bg-warning"> {{number_format($total)}}</td>
                <td class=""><strong> :سەرجەمی پارەی هاتووەی تێستەکان  </strong> </td>
        </tr>

<tr ><td class="bordered-0"></td></tr>
        <tr>
                <td class="text-danger bg-warning"> {{number_format($expense)}}</td>
                <td class=""><strong> : سەرجەمی خەرجیەکان </strong></td>
        </tr>


<tr ><td class="bordered-0"></td> </tr>
        <tr>
                <td class="text-danger bg-warning">{{number_format($total - $expense)}}</td>
                <td class=""> <strong> :  کۆی قازانجی گشتی  </strong> </td>
        </tr>  

 </tbody>
</table>
</div>
</div>

@endsection