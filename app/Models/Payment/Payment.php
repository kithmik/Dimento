<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    protected $table = 'payments';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function invoice(){
        return $this->belongsTo('App\Models\Payment\Invoice');
    }

}
