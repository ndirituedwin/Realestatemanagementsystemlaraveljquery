<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenantbalance extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'property_id',
        'tcode',
        'telno',
        'location',
        'fieldofficer',
        'balance',
    ];
    public function vacantunit(){
      return $this->belongsTo(Vacantunit::class,'property_id');  
    }
    public static function sum($name,$amount){
        Tenantbalance::where('name',$name)->update(['balance'=>$amount]);
    }
    public static function summation($name){
       

        return  Tenantbalance::where('name',$name)->sum('amount');
    }
}

