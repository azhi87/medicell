<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function income(Request $request)
    {
    	$from=$request['from'];
    	$to=$request['to'];
    	$visitations=\App\Visitation::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->get();
    	    	    return view('reports.income',compact(['visitations','from','to']));

    }

    public function incomeTests(Request $request)
    {
    	$from=$request['from'];
    	$to=$request['to'];
    	$tests=\App\Investigation::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->get();
    	    	    return view('reports.incomeTests',compact(['tests','from','to']));

    }
    
    public function subtestTotal(Request $request)
    {
    	$from=$request['from'];
    	$to=$request['to'];
    	$tests=DB::table('investigations')->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->where('sale_price','<>','0')
    // 	->whereNOTIn('subtest_id',function($query){
    //           $query->select('subtest_id')->from('specials');
    //         })
    	->select('subtest_id', DB::raw('count(subtest_id) as total'))->groupBy('subtest_id')->get();
    	
    ///	dd($tests);
    	  return view('reports.subtestTotal',compact(['tests','from','to']));

    }

    public function allProfit(Request $request)
    {
    	$from=$request['from'];
    	$to=$request['to'];
    	    	$total=\App\Visitation::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->sum('calculated_paid');
    	    	$discount=\App\Visitation::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->sum('discount');
    	    	$expense=\App\Expense::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->sum('amount');
    	    return view('reports.allProfit',compact(['total','discount','expense','from','to']));
    }

}
