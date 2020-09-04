<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EraserTaken extends Model
{
    protected $table = 'eraser_taken';
    protected $guarded = ['id'];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }
}
