<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=['disc_name','disc_value','disc_code'];

    
    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}
