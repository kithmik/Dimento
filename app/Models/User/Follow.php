<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $guarded = ['id'];

    protected $table = 'follows';



}
