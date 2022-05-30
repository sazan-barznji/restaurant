<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['res_name'];

    public function meal(): HasOne
    {
        return $this->hasOne(Meal::class);
    }
}
