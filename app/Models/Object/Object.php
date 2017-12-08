<?php

namespace App\Models\Object;

use Carbon\Carbon;
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

    public function getAgeAttr()
    {
//        return Carbon::createFromTimestamp(strtotime($this->attributes['created_at']))
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
//        return Carbon::parse($this->attributes['created_at'])->age;
    }

    public function getTimeAttr(){
        return Carbon::parse($this->attributes['created_at'])->format('d F Y, g:i:s a');
    }

    public function getUserViewCount(){
        return $this->view_count;
    }

    public function getUserReadCount(){
        return $this->view_count;
    }

    public function avgRating(){
        if(auth()->check()){
            return Rating::where('object_id', $this->id)->avg('rating');
        }
    }

    public function userReaction(){
        if(auth()->check()){
            return Rating::where(['user_id' => auth()->user()->id, 'object_id' => $this->id])->first();
        }

    }

    public function getCommentsCount(){
        return $this->comments()->count();
    }

    public function getLikesCount(){
        return Rating::where(['object_id' => $this->id, 'status' => 1])->count();
    }

    public function getDisLikesCount(){
        return Rating::where(['object_id' => $this->id, 'status' => 0])->count();
    }


}
