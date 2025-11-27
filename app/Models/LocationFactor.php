<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationFactor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category', 'weight'];


    public function scores()
    {
        return $this->hasMany(PlotLocationScore::class, 'factor_id');
    }
}
