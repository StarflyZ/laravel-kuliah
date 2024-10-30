<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    public function contributsions()
    {
        return $this->belongsToMany(
            Product::class,
            "contribution_product",
            "product_id",
            "contribution_id"
        )
            ->withPivot("amount");
    }
}
