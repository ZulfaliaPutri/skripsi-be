<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function clothes()
    {
        return $this->belongsTo(Clothes::class);
    }
}
