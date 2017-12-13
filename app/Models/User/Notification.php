<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = ['id'];

    protected $table = 'notifications';

    public function user(){
<<<<<<< HEAD
        return $this->belongsToMany('App\Models\User\User', 'user_notifications', 'notification_id')
            ->withPivot('read');
=======
        return $this->belongsToMany('App\Models\User\User', 'user_notifications', 'notification_id');
>>>>>>> bd01b0bb4493117da55bbb3012bd171123371a0c
    }

}
