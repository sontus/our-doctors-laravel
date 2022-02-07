<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    // Relationship with Division
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // Relationship with upazilla
    public function upazilas()
    {
        return $this->hasMany(Upazilla::class);
    }
}
