<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spicialization extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function centers()
    {
        return $this->belongsToMany(Center::class,'center_spic','spicialization_id', 'center_id')
            ->withTimestamps();
    }
    
//     public function spicializations()
// {
//     return $this->belongsToMany(CenterSpec::class, 'center_center_spec', 'center_id', 'center_spec_id');
// }

}
