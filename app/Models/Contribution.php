<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $primaryKey = 'contribution_id';
    public function employee()
    {
        return $this->belongsTo(Employee::class, "username", "username");
    }
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, "citizen_id", "citizen_id");
    }
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            "contribution_product",
            "contribution_id",
            "product_id"
        )->withPivot("amount");
    }
}
