<?php

namespace App\Models\Message;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id'];

    protected $table = 'messages';

    public function sent_by(){
        $user = User::where('id', $this->sender_id)->get();
        return $user;
    }

    public function received_by(){
        $user = User::where('id', $this->recipient_id)->get();
        return $user;
    }

    public function getAgeAttr()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getTimeAttr(){
        return Carbon::parse($this->attributes['created_at'])->format('d F Y, g:i:s a');
    }

}
