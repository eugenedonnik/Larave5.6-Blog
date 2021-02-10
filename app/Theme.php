<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    //
    protected $table = 'themes';

    public function themes(){
        return $this->hasMany(Comment::class);
    }
}
