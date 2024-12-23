<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citizen extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'citizen_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    public function contributions(){
        return $this->hasMany(Contribution::class, "citizen_id", "citizen_id");
    }
}
