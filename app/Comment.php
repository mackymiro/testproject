<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'comments_id',
        'date',
        'name',
        'comments',
        
    ];

}
