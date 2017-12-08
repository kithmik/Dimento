<?php

namespace App\Models\Forum;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $table = 'posts';

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function replies(){
        return $this->belongsTo('App\Models\Forum\Reply');
    }


    public function ratings(){
        return $this->hasMany('App\Models\Forum\Rating');
    }

    public function getAgeAttr()
    {
//        return Carbon::createFromTimestamp(strtotime($this->attributes['created_at']))
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
//        return Carbon::parse($this->attributes['created_at'])->age;
    }

    public function getTimeAttr(){
        return Carbon::parse($this->attributes['created_at'])->format('d F Y, g:i:s a');
    }

  
}
