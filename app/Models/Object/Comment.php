<?php

namespace App\Models\Object;

use Carbon\Carbon;
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

    public function getAgeAttr()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getTimeAttr(){
        return Carbon::parse($this->attributes['created_at'])->format('d F Y, g:i:s a');
    }
}
