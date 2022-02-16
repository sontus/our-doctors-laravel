<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    // relatinship with doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
