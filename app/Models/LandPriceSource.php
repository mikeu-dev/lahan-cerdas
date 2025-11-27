<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandPriceSource extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'reliability_score'];


    public function prices()
    {
        return $this->hasMany(LandPrice::class, 'source_id');
    }
}
