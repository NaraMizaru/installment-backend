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
}
