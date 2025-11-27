<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandPlot extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'region_id',
        'title',
        'description',
        'latitude',
        'longitude',
        'address',
        'land_area',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function prices()
    {
        return $this->hasMany(LandPrice::class);
    }
    public function scores()
    {
        return $this->hasMany(PlotLocationScore::class);
    }
    public function recommendations()
    {
        return $this->hasMany(BusinessRecommendation::class);
    }
    public function simulations()
    {
        return $this->hasMany(InvestmentSimulation::class);
    }
}
