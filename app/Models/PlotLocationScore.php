<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotLocationScore extends Model
{
    use HasFactory;
    protected $fillable = ['land_plot_id', 'factor_id', 'score', 'detail'];


    public function plot()
    {
        return $this->belongsTo(LandPlot::class);
    }
    public function factor()
    {
        return $this->belongsTo(LocationFactor::class, 'factor_id');
    }
}
