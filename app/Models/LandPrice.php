<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandPrice extends Model
{
    use HasFactory;
    protected $fillable = ['land_plot_id', 'source_id', 'price_per_m2', 'year', 'notes'];


    public function plot()
    {
        return $this->belongsTo(LandPlot::class, 'land_plot_id');
    }
    public function source()
    {
        return $this->belongsTo(LandPriceSource::class, 'source_id');
    }
}
