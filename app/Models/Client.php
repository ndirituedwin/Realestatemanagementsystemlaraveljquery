<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable=
    [
        'client',
        'db_name',
    ];
   public static function configure($dbnamedependingonclientname){
    $config=Config::get('database.connections.sqlsrv');
    $config['database']=$dbnamedependingonclientname;
    $config['password']="";
    $config['username']="";
    config()->set('database.connections.sqlsrv',$config);
    DB::purge('sqlsrv');
    DB::reconnect('sqlsrv');
    return $config;
   }
}
