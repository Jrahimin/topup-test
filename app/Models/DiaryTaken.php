<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryTaken extends Model
{
    protected $table = 'diary_taken';
    protected $guarded = ['id'];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }
}
