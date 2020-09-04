<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenTaken extends Model
{
    protected $table = 'pen_taken';
    protected $guarded = ['id'];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }
}
