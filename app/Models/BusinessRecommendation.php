<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessRecommendation extends Model
{
    use HasFactory;
    protected $fillable = ['land_plot_id', 'recommended_business', 'potential_score', 'reason'];


    public function plot()
    {
        return $this->belongsTo(LandPlot::class, 'land_plot_id');
    }
}
