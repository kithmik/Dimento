<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $table = 'posts';
}
