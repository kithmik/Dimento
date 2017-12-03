<?php

namespace App\Models\Advertisement;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $guarded = ['id'];

    protected $table = 'advertisements';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

}
