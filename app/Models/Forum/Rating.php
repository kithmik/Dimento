<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = ['id'];

    protected $table = 'ratings';
}
