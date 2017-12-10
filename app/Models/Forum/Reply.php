<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = ['id'];

    protected $table = 'replies';

    public function post(){
        return $this->belongsTo('App\Models\Forum\Post');
    }

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }
}
