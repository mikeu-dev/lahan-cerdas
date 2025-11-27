<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoLayerPolygon extends Model
{
    use HasFactory;
    protected $fillable = ['layer_id', 'geojson'];


    public function layer()
    {
        return $this->belongsTo(GeoLayer::class, 'layer_id');
    }
}
