<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoLayer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'layer_type', 'description', 'source'];


    public function polygons()
    {
        return $this->hasMany(GeoLayerPolygon::class, 'layer_id');
    }
}
