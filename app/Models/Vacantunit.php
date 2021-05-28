<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacantunit extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['property_id','unit','category','location','rent_amount'];
    protected $dates=['deleted_at'];
    public function tenantbalances(){
        return $this->hasMany(Tenantbalance::class,'property_id');
    }
}
