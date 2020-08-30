<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('main.index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout',function(){
    \Auth::logout();
    return redirect('/login');
    });


    Route::get('/patient','PatientController@index');
    Route::get('/patients/patientNameById','PatientController@getPatientNameById');
    Route::post('/patient/store/{id?}','PatientController@store');
    // Route::post('/patient/search','PatientController@store');

    Route::get('/patient/edit/{id}','PatientController@edit');
    Route::get('/patient/search','PatientController@showSearch');
    Route::post('/patient/search','PatientController@search');
    Route::get('/patient/print/{id}','PatientController@print');
    Route::get('/patients/today','VisitationController@today');
     Route::get('/patients/today/{id?}','VisitationController@today');

    
    Route::post('/maintest/store/{id?}','MaintestController@store');
    Route::get('/maintest/edit/{id}','MaintestController@edit');
    Route::get('/maintests','MaintestController@index');
    Route::post('/subtest/store/{id?}','SubtestController@store');
    Route::get('/subtests','SubtestController@index');
    Route::get('/subtest/edit/{id}','SubtestController@edit');
    
	Route::get('/users/edit/{id}',function($id){
			$user=\App\User::find($id);
			return view('auth.updateUser',compact('user'));
			});
	Route::post('/users/update/{id}','UserController@updateUser');

	Route::get('/users',function(){
			$users=\App\User::all();
			return view('auth.showUsers',compact('users'));
		});
		
	
    Route::get('/patient/investigationPrint/{id}','PatientController@investigationPrint');
    Route::get('/patient/radiologistPrint/{id}','PatientController@radiologistPrint');
    Route::get('/patient/emgeegPrint/{id}','PatientController@emgeegPrint');
    Route::get('/patient/extra1Print/{id}','PatientController@extra1Print');
    Route::get('/patient/treatmentPrint/{id}','PatientController@treatmentPrint');
    Route::get('/patient/dischargePrint/{id}','PatientController@dischargePrint');
    
    Route::get('/refferal','RefferalController@index');
    Route::get('/refferal/edit/{id}','RefferalController@edit');
    Route::post('/refferal/store/{id?}','RefferalController@store');
    
    
	Route::get('/reports',function(){
		return view('reports.reportHome');
    });
    Route::post('/reports/income','ReportController@income');
    Route::post('/reports/subtestTotal','ReportController@subtestTotal');
    
    Route::post('/reports/incomeTests','ReportController@incomeTests');
    Route::post('/reports/allProfit','ReportController@allProfit');
    
    Route::get('/expenses','ExpenseController@index');
	Route::post('/expenses/store/{id}','ExpenseController@store');
	Route::post('/expenses/store/','ExpenseController@store');
	Route::post('/expenses/search','ExpenseController@search');
	Route::post('/expenses/searchReason','ExpenseController@searchReason');
	Route::get('/expenses/edit/{id}',function($id){
			$expense=\App\Expense::find($id);
			return view('expenses.expenseUpdate',compact('expense'));
		});


    //test visitations
    Route::post('/visitation/store/{id?}/{patient_id?}','VisitationController@store');

    Route::get('/visitation/edit/{id}/{patient_id?}','VisitationController@edit');
    Route::get('/visitation/view/{id}/{patient_id?}','VisitationController@view');
    Route::get('/visitation/new/{id?}','VisitationController@new');
    Route::get('/visitation/subtest/delete/{id?}','VisitationController@deleteSubtest');
    Route::get('/visitation/subtest/toggleStatus/{id?}','VisitationController@toggleSubtest');
    
    Route::get('/visitation/delete/{id?}','VisitationController@delete');
    
    Route::get('/visitation/followup/{id}','VisitationController@folloup');


    Route::get('/specials','SpecialController@index');
    Route::post('/specials/store','SpecialController@store');
    Route::get('/specials/ajaxCall','SpecialController@ajaxCall');

});


