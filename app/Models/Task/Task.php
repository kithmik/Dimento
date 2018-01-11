<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    protected $table = 'tasks';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function bids(){
        return $this->hasMany('App\Models\Task\Bids');
    }

}
