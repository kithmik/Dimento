<?php

namespace App\Models\Object;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $guarded = ['id'];

    protected $table = 'objects';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function comments(){
        return $this->hasMany('App\Models\Object\Comment');
    }

    public function ratings(){
        return $this->hasMany('App\Models\Object\Rating');
    }
}
