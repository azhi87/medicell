<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['patients','editPatient','editVisitations'],function($view){
            $view->with([
                'maintests'=>\App\Maintest::all(),
                'patients'=>\App\Patient::all(),
                'refferals'=>\App\Refferal::all(),
                ]);
        });

 view()->composer(['today'],function($view){
            $view->with([
                'spts'=>\App\Patient::all(),
                ]);
        });

view()->composer(['expenses.expenseHome','staff.staffHome'],function($view){
            $view->with([

              ]);
          });
  
 view()->composer(['maintests'],function($view){
            $view->with([
                'mts'=>\App\Maintest::all(),
                ]);
        });

  view()->composer(['subtests','editSubtest'],function($view){
            $view->with([
                'sts'=>\App\Subtest::all(),
                 'mts'=>\App\Maintest::all(),
                ]);
        });

   view()->composer(['specials'],function($view){
            $view->with([
                'sts'=>\App\Subtest::all(),
                ]);
        });

        view()->composer(['investigationPrint'],function($view){
            $view->with([
                'maintests'=>\App\Maintest::all(),
                ]);
        });

        view()->composer(['refferals','editRefferal'],function($view){
            $view->with([
                'res'=>\App\Refferal::all(),
                ]);
        });

        view()->composer(['treatments'],function($view){
            $view->with([
                'treatments'=>\App\Treatment::orderBy('tr_name')->get(),
                ]);
        });
    }
    

}
