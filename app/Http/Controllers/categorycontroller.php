<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categorycontroller extends Controller
{
    public function getvacantunitsbycategor(Request $request){
      $dbname=session("dbname");
    Client::configure($dbname);
        if($request->ajax()){
       // echo"<pre>";print_r($request->all());die;
            $emplode=explode(";",$request['property_id']);
            $property_id=$emplode[1];
               $first=explode(";",$request['category']);
               $first=$first[1];
               $status=$request['status'];
             //  echo"<pre>";print_r($request->all());die;

                   if($first=='All' || $property_id=='All'|| $status=='All'){
              }if($first =='All' && $property_id=='All' && $status=='All'){
                //echo"<pre>";print_r($request->all());die;
                $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[':param1'=>'All',':param2'=>'All',':param3'=>'All',':param4'=>'All',]);
            }else{
                   $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[$status,$property_id,$first,':param4'=>'All',]);
                }
                       }
               return view('auth.appendvacantunits')
             ->withvacantunits($vacantunits);



    }
    public function statusselect(Request $request){
      $dbname=session("dbname");
    Client::configure($dbname);
        if($request->ajax()){
           // echo"<pre>";print_r($request->all());die;

                 $emplode=explode(";",$request['property_id']);
            $property_id=$emplode[1];
        //    echo"<pre>";print_r($request->all());die;
               $first=explode(";",$request['category']);
               $category=$first[1];
               $status=$request['status'];
              //echo"<pre>";print_r($request->all());die;
                   if($category=='All' || $property_id=='All'|| $status=='All'){
              }    if($category=='All' && $property_id=='All' && $status=='All'){
                //echo"<pre>";print_r($request->all());die;
                $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[':param1'=>'All',':param2'=>'All',':param3'=>'All',':param4'=>'All']);
            }else{
                   $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[$status,$property_id,$category,':param4'=>'All']);
                }
                       }
               return view('auth.appendvacantunits')
             ->withvacantunits($vacantunits);



    }

}