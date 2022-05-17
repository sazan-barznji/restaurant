<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['disc_id','meal_id','total_price','total_time', 'quantity','service','table_num'];


    public function disocunt(): BelongsTo
    {
        return $this->belongsTo(Disocunt::class, 'disc_id');
    }
    
    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }
  
}
