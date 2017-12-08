<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $guarded = ['id'];

    protected $table = 'social_logins';


}
