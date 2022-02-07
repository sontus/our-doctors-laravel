<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    use HasFactory;
    protected $table = 'upazilas';
    // Relationship with Disrict
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
