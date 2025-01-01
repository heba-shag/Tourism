<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['star'];



    public function spicializations()
    {
        return $this->belongsToMany(Spicialization::class, 'center_spic', 'center_id', 'spicialization_id')
            ->withTimestamps();
    }

    public function ratecenter()
    {
        return $this->hasMany(RateCenter::class);
    }

//     public function centers()
// {
//     return $this->belongsToMany(Center::class, 'center_center_spec', 'center_spec_id', 'center_id');
// }

}
