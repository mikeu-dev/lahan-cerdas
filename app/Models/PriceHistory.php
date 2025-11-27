<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{
    use HasFactory;
    protected $table = 'price_history';
    protected $fillable = ['region_id', 'year', 'avg_price', 'min_price', 'max_price'];


    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
