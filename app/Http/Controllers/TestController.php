<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function get(){
        $dbname=session("dbname");
    Client::configure($dbname);
        return view('test');
    }
}
