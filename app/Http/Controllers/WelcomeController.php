<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function getlogin(Request $request){
        $request->session()->flush();
        $dbname=session("dbname");
        Client::configure($dbname);
        return view('welcome');
    }
}