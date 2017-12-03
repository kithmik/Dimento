<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = ['id'];

    protected $table = 'notifications';

    public function user(){
        return $this->belongsToMany('App\Models\User\User', 'user_notifications', 'notification_id');
    }

}
