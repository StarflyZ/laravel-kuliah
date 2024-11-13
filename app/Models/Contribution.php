<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $primaryKey = 'contribution_id';
    protected $fillable = ['contribution_date', 'username', 'citizen_id'];
    public function employee()
    {
        return $this->belongsTo(Employee::class, "username", "username");
    }
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, "citizen_id", "citizen_id")->withTrashed();
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
    public $timestamps = false;
}
