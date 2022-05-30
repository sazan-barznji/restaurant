<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meal extends Model
{
    use HasFactory;
    
    protected $fillable=['photo','title','price', 'ingr','quantity','time','rest_id','cate_id'];

    //to give full path of the photo
    public function getFeatureAttribute($photo)
    {
        return asset($photo);
    }
 
    public function rest(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'rest_id');
    }
   
    public function cate(): BelongsTo
    {
        // return $this->belongsTo('App\Models\Category');
        return $this->belongsTo(Category::class, 'cate_id','id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
