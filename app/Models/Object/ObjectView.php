<?php

namespace App\Models\Object;

use Illuminate\Database\Eloquent\Model;

class ObjectView extends Model
{
    protected $guarded = ['id'];

    protected $table = 'object_views';

    public function object()
    {
        return $this->belongsTo('App\Models\Object\Object');
    }
}
