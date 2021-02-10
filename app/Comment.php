<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    public function theme(){
        return $this->belongsTo(Theme::class);
    }
}
