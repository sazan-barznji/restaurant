<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    
    protected $fillable=['photo','title','price', 'ingr','time','rest_id','cate_id'];

    //to give full path of the photo
    public function getFeatureAttribute($photo)
    {
        return asset($photo);
    }
 
    public function rest(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'rest_id');
    }
   
    public function user(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
