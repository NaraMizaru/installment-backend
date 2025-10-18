<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstallmentApplySociety extends Model
{
    public $timestamps = false;

    public function availableMonth()
    {
        return $this->belongsTo(AvailableMonth::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function installment()
    {
        return $this->belongsTo(Installment::class);
    }
}
