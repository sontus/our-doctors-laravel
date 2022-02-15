<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    /**
     * Get all of the chambers for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chambers()
    {
        return $this->hasMany(Chamber::class);
    }


}
