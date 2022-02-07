<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
     /**
     * Get all of the chambers for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chambers()
    {
        return $this->hasMany(Chamber::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
