<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the Chamber
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function doctor()
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    // }

    /**
     * Get the user that owns the Chamber
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
