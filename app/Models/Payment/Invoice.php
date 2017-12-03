<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];

    protected $table = 'invoices';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment\Payment');
    }
}
