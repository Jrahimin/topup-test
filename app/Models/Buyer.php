<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $guarded = ['id'];

    public function diaries(){
        return $this->hasMany(DiaryTaken::class);
    }

    public function erasers(){
        return $this->hasMany(EraserTaken::class);
    }

    public function pens(){
        return $this->hasMany(PenTaken::class);
    }
}
