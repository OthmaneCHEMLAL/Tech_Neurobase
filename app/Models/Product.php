<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'product_description', 'status',
        'template', 'seo_title', 'category_id', 'images',
        'points', 'characteristics', 'attributes'
    ];

    protected $casts = [
        'images' => 'array',
        'points' => 'array',
        'attributes' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
