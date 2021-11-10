<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vacantunit;
use Illuminate\Http\Request;
use App\Models\Tenantbalance;
use Illuminate\Support\Facades\DB;

class VacantunitController extends Controller
{
   public function vacant(){
    $vacantunits=DB::select("EXEC spallvacantunits ");

   }
    public function getvacantunits(Request $request){
        $dbname=session("dbname");
    Client::configure($dbname);
        if($request->ajax()){
          $data=$request->all();
           $category=explode(";",$data['category']);
           $categoryid=$category[1];
          // echo"<pre>";print_r($dbname);die;
           $status=$request['status'];
         $emplode=explode(";",$data['property_id']);
         $property_id=$emplode[1];
        if($property_id=='All' || $categoryid=='All' || $status=='All'){
         // echo"<pre>";print_r($categoryid);die;
   //  $vacantunits=DB::select("EXEC Pro_Unit_Report :param1,:param2,:param3",[':param1'=>'All',':param2'=>'All',':param3'=>'All',]);
   //  $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3",[':param1'=>$status,':param2'=>'All',':param3'=>'All',]);
        }if($property_id =='All'  && $categoryid=='All' && $status=='All'){
        //  echo"<pre>";print_r("Select category");die;
        $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[':param1'=>'All',':param2'=>'All',':param3'=>'All',':param3'=>'All',]);

    }else{
        $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[':param1'=>$status,':param2'=>$property_id,':param3'=>$categoryid,':param4'=>'All']);

       //  $vacantunits=DB::select("EXEC Pro_Unit_Report ?,?,?",array('All',$property_id,'All'));
          }
            return view('auth.appendvacantunits')
             ->withvacantunits($vacantunits);

        }

    }
    public function singlevacantunit($id){
        $dbname=session("dbname");
        Client::configure($dbname);
           $getvacantunit=DB::select("EXEC spallvacantunitswhereid ?",[$id]);
           return view('vacantunits.singlevacantunit')->withvacantunit($getvacantunit);

    }
}