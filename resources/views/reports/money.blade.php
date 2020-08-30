@extends('layouts.master')
@section('content')

    <div class="row bordered-1">
        <h3 class="text-center" ><strong> ڕاپۆرتی سندوق</strong></h3>
<div class="col-md-12 col-sm-12 ">

        <table class="table text-center tseparate table-bordered tfs16boldc tfs12boldp margin-1">
        <tbody >

         <tr class="hidden">
            <td class=" bordered-0 "> </td>
            <td class="text-danger bg-warning">{{number_format($todaySales,2)}}</td>
            <td class="bg-info"> :کۆی وەسڵی فرۆشتنی ئەمڕۆ</td>
      </tr>

         <tr>
            <td class="bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format($allincomeSales,2)}}</td>
            <td class="bg-info"> :کۆی پارەی هاتوو لە وەسڵدا   </td>
        </tr>

        <tr>
            <td class="bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format($allincomeDebts,2)}}</td>
            <td class="bg-info"> :کۆی پارەی هاتوو لە قەرزدا   </td>
        </tr>

        <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format($alliBanks-$alloBanks,2)}}</td>
            <td class="bg-info"> :کۆی پارەی بانك  </td>
          </tr>

         <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format($alloutcomeExpenses,2)}}</td>
            <td class="bg-info"> :کۆی پارەی خەرجیەکان + ڕۆیشتوو  </td>
          </tr>
    
        <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format(($allincomeSales+$allincomeDebts+($alliBanks-$alloBanks))-($alloutcomeExpenses),2)}}</td>
            <td class="bg-info"> :سەرجەمی پارەی سندووق  </td>
        
        </tr>
      
 </tbody>
</table>
</div>
</div>
<hr>
    <div class="row bordered-1">
                <h3 class="text-center" ><strong> ڕاپۆرتی گشتی قەرزی نووسینگە</strong></h3>
<div class="col-md-12 col-sm-12 ">

        <table class="table text-center tseparate table-bordered tfs16boldc tfs12boldp margin-1">
        <tbody >

        <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format(($allincomeSales+$allincomeDebts+($alliBanks-$alloBanks))-($alloutcomeExpenses),2)}}</td>
            <td class="bg-info"> :سەرجەمی پارەی سندووق  </td>
        
        </tr>


         <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format(($oldSales-$oldDebts)+$todaySales-$todayDebts,2)}}</td>
            <td class="bg-info"> : کۆی قەرزی تاقیگەکان  </td>
      </tr>

         <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">{{number_format($valuation,2)}}</td>
            <td class="bg-info"> :کۆی پارەی مەوادی مەخزەن  </td>
      </tr>
     

    <tr>
            <td class=" bordered-0"> </td>
            <td class="text-danger bg-warning">
            
            {{number_format((($allincomeSales+$allincomeDebts+($alliBanks-$alloBanks))-($alloutcomeExpenses))+(($oldSales-$oldDebts)+$todaySales-$todayDebts)+($valuation),2)}}
            
            </td>
            <td class="bg-info"> :سەرجەمی قەرزی سەر نووسینگە   </td>
        
      </tr>
      
 </tbody>
</table>
</div>
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