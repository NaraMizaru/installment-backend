<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    public $timestamps = false;

    public function validator()
    {
        return $this->belongsTo(Validator::class);
    }
}
