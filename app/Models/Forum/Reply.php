<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = ['id'];

    protected $table = 'replies';
}
