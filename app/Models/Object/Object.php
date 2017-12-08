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
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getTimeAttr(){
        return Carbon::parse($this->attributes['created_at'])->format('d F Y, g:i:s a');
    }

    public function getUserViewCount(){
        return $this->view_count;
    }

    public function getUserReadCount(){
        return ObjectView::where(['object_id' => $this->id, 'opened' => 1])->count();
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



    public function incrementObjectViews($opened = 0)
    {
        if (auth()->check()){

            $last_read = ObjectView::where(['object_id' => $this->id, 'user_id' => auth()->user()->id])->orderBy('updated_at', 'desc')->first();
            if (count($last_read)){
                $last_read_time = new Carbon($last_read->updated_at);
                if (Carbon::now()->diffInSeconds($last_read_time) < 10){
                    return;
                }
            }


            $userPostView = new ObjectView;
            $userPostView->object_id = $this->id;
            $userPostView->user_id = auth()->user()->id;

            if ($opened == 1){
                $userPostView->opened = 1;
            }
            else{
                $userPostView->opened = 0;
            }
            $userPostView->save();
        }
        else{ /*Post::where('id', $this->id)->update(['public_views' => $this->public_views], ['timestamps' => false]);*/
            $this->timestamps = false;
            $this->increment('view_count');
        }

    }


}
