<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function availableMonth()
    {
        return $this->hasMany(AvailableMonth::class);
    }

    public function applications()
    {
        return $this->hasMany(InstallmentApplySociety::class);
    }
}
