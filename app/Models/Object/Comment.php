<?php

namespace App\Models\Object;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    protected $table = 'comments';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function object(){
        return $this->belongsTo('App\Models\Object\Object');
    }
}
