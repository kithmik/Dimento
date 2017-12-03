<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    protected $guarded = ['id'];

    protected $table = 'bids';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function task(){
        return $this->belongsTo('App\Models\Task\Task');
    }
}
