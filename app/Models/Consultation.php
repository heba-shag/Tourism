<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Consultation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'spicialization_id',
        'massege',
        'country_code',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function spicialization()
    {
        return $this->belongsTo(Spicialization::class);
    }

    public static function getMostCommon()
    {
        // return self::select('spicialization_id', 'massege', DB::raw('count(massege) as total'))
        // ->groupBy('spicialization_id', 'massege')
        // ->orderBy('spicialization_id')
        // ->orderBy('total', 'desc')
        // ->get();

        return self::select('spicialization_id', 'massege', DB::raw('count(massege) as total'))
        ->groupBy('spicialization_id', 'massege')
        ->orderBy('total', 'desc')
        ->orderBy('spicialization_id')
        ->limit(3)->get(); // Limit to the most common message for each specialization


    //     $mostCommonSubquery = self::select('spicialization_id', DB::raw('max(massege) as most_common_message'), DB::raw('max(count(massege) as total'))
    //     ->groupBy('spicialization_id')
    //     ->orderBy('total', 'desc')
    //     ->orderBy('spicialization_id')
    //     ->limit(1); // Limit to the most common message for each specialization

    // $subqueryAlias = 'most_common_subquery';

    // return self::joinSub($mostCommonSubquery, $subqueryAlias, function ($join) {
    //     $join->on('consultations.spicialization_id', '=', "subqueryAlias.spicialization_id");
    // })
    // ->select('consultations.spicialization_id', "{$subqueryAlias}.most_common_message", "{$subqueryAlias}.total")
    // ->get();
    }

}
