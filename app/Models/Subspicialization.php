<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subspicialization extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Spicialization()
    {
        return $this->belongsTo(Spicialization::class);
    }
}
