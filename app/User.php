<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','type','mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function typeText()
    {
        if($this->type=='admin')
        {
            return 'ئەدمین';
        }
        if($this->type=='accountant')
        {
            return 'محاسب';
        }
        if($this->type=='accountant_high')
        {
            return 'محاسب باڵا';
        }
        if($this->type=='mandwb')
        {
            return 'کارمەند';
        }
        if($this->type=='driver')
        {
            return 'شۆفێر';
        }
        if($this->type=='super_admin')
        {
            return 'ئەدمینی باڵا';
        }
        if($this->type=='supervisor')
        {
            return 'س.مەخزەن';
        }
    }
    public function toggleStatus()
    {
        if($this->status=="1")
            $this->status="0";
        elseif($this->status=="0")
        {
            $this->status="1";
        }
        $this->save();
    }
  
}
