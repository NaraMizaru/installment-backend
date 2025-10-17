<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Society extends Authenticatable
{
    use HasApiTokens;

    public $timestamps = false;


    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}
