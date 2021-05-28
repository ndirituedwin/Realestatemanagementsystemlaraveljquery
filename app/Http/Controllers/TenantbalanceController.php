<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Tenantbalance;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Date;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Session\Session;

class TenantbalanceController extends Controller
{
    public function tenantbalances(){ 
      $mytime = Carbon::now();
  // echo $mytime->toDateTimeString();
 /*$ldate = Date::now()->format('l j F Y H:i:s');
  $ldate=explode(" ",$ldate);
  $montho=$ldate[2];
  dd($montho);*/
   $properties=DB::select("EXEC Pro_AllActiveProperties");
   $fieldofficers=DB::select("EXEC selectallfieldofficers ?,?,?",['null','All','null']);
      $date=(Carbon::now());
        $explode=explode("-",$date);
         $fetchyear=$explode[0];
         $fechmonth=$explode[1];
         $fetchday=$explode[2];
      $payables=DB::select("EXEC selectallfieldofficers ?,?,?",['null','null','All']);
      $tenantbalnces=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All','All','All',$fechmonth,$fetchyear,'All']);
   //   dd($tenantbalnces);
      return view('tenantbalance.tenantbalances')
        ->withfieldofficers($fieldofficers)
        ->withproperties($properties)
        ->withpayables($payables)
     ->withtenantbalances($tenantbalnces);
        //->withvacantunits($vacantunits);
    }
    public function gettenantbalances(Request $request){
        if($request->ajax()){
            $property=explode(";",$request['property_id']);
            $propertyID=$property[1];
            $fieldofficer=explode(";",$request['fieldofficerselect']);
            $fieldofficerID=$fieldofficer[1];

            $payable=explode(";",$request['payableselect']);
            $payableID=$payable[1];
          //  echo"<pre>";print_r($payableID);die;

            $month=explode(";",$request['month']);
            $month=$month[0];

            $year=$request['year'];
             $date=(Carbon::now());
            $explode=explode("-",$date);
             $fetchyear=$explode[0];
            // echo"<pre>";print_r($fetchyear);die;

             $fechmonth=$explode[1];
             $fechmonth=ltrim($fechmonth,0);
        if ($propertyID=='All' || $fieldofficerID=='All' || $payableID=='All') {
        }if($propertyID=='All' && $year==$fetchyear && $month==$fechmonth && $fieldofficerID=='All' && $payableID=='All'){

          $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All','All','All',$fechmonth,$fetchyear,'All']);
        }else{
        $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All',$propertyID,$fieldofficerID,$month,$year,$payableID]);
       //  echo"<pre>";print_r($tenantbalances);die;

        }
          

               return view('tenantbalance.appendtenantbalances')
             ->withtenantbalances($tenantbalances);

        }
    }
    public function gettenatbalancesbyfieldofficer(Request $request){
      if($request->ajax()){
   //echo"<pre>";print_r($request->all());die;    
        $property=explode(";",$request['property_id']);
        $propertyID=$property[1];
        $payable=explode(";",$request['payableselect']);
        $payableID=$payable[1];
        $fieldofficer=explode(";",$request['fieldofficer']);
        $fieldofficer=$fieldofficer[1];
       $month=explode(";",$request['month']);
       $month=$month[0];
       $year=$request['year'];
     //echo"<pre>";print_r($fieldofficer);die;
         $date=(Carbon::now());
        $explode=explode("-",$date);
         $fetchyear=$explode[0];
         $fechmonth=$explode[1];
         $fechmonth=ltrim($fechmonth,0);
    if ($fieldofficer=='All'|| $propertyID=='All' || $payableID=='All') {
// echo"<pre>";print_r("All");die;
    } if($fieldofficer=='All'  && $month==$fechmonth && $year==$fetchyear  && $propertyID=='All' && $payableID=='All'){
      $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All','All','All',$fechmonth,$fetchyear,'All']);
      //echo"<pre>";print_r($tenantbalances);die;

    }else{
        $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All',$propertyID,$fieldofficer,$month,$year,$payableID]);
        //echo"<pre>";print_r($tenantbalances);die;

      }
           return view('tenantbalance.appendtenantbalances')
         ->withtenantbalances($tenantbalances);

    }
    }
    public function gettenatbalancesbypayables(Request $request){
      if($request->ajax()){
        $property=explode(";",$request['property_id']);
        $propertyID=$property[1];

       $fieldofficer=explode(";",$request['fieldofficer']);
        $fieldofficerID=$fieldofficer[1];

       $payable=explode(";",$request['payable']);
        $payable=$payable[1];
      //  echo"<pre>";print_r($request->all());die;
       $year=$request['year'];
       $month=explode(";",$request['month']);
        $month=$month[0];
       
   // echo"<pre>";print_r($request->all());die;
         $date=(Carbon::now());
        $explode=explode("-",$date);
         $fetchyear=$explode[0];
         $fechmonth=$explode[1];
         $fechmonth=ltrim($fechmonth,0);
    if ($propertyID =='All' || $fieldofficerID =='All' || $payable=='All') {
        //echo"<pre>";print_r("All");die;
    } if($propertyID =='All' && $fieldofficerID =='All' && $payable=='All' && $month==$fechmonth && $year==$fetchyear){
       $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?", ['All','All','All',$fechmonth,$fetchyear,'All']);
        //echo"<pre>";print_r($tenantbalances);die;
        }else{
       //   echo"<pre>";print_r($request->all());die;
        $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All',$propertyID,$fieldofficerID,$month,$year,$payable]);
        //echo"<pre>";print_r($tenantbalances);die;

      }
           return view('tenantbalance.appendtenantbalances')
         ->withtenantbalances($tenantbalances);

    }
    }
    public function gettenatbalancesbymonth(Request $request){
      if($request->ajax()){
// echo"<pre>";print_r($request->all());die;

        $data=$request->all();
        $property=explode(";",$request['property_id']);
        $propertyID=$property[1];
        $fieldofficer=explode(";",$request['fieldofficer']);
        $fieldofficerID=$fieldofficer[1];
         $year=$request['year'];
        $data=explode(";",$request['payable']);
        $payable=$data[1];
        $month=explode(";",$request['month']);
        $month=$month[0];
    //    echo"<pre>";print_r($month);die; 

        $date=(Carbon::now());
        $explode=explode("-",$date);
         $fetchyear=$explode[0];
         $fechmonth=$explode[1];
         $fechmonth=ltrim($fechmonth,0);
         if ($propertyID =='All' || $fieldofficerID =='All' || $payable=='All') {
        } if($propertyID =='All' && $fieldofficerID =='All' && $payable=='All' && $month==$fechmonth && $year==$fetchyear){
      $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All','All','All',$fechmonth,$fetchyear,'All']);
      //echo"<pre>";print_r($tenantbalances);die;

    }else{
        $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All',$propertyID,$fieldofficerID,$month,$year,$payable]);
        //echo"<pre>";print_r($tenantbalances);die;

      }
           return view('tenantbalance.appendtenantbalances')
         ->withtenantbalances($tenantbalances);

    }
    }
    public function gettenatbalancesbyyear(Request $request){
      if($request->ajax()){
  //echo"<pre>";print_r($request->all());die;

       $data=$request->all();
       $property=explode(";",$request['property_id']);
       $propertyID=$property[1];
       $fieldofficer=explode(";",$request['fieldofficer']);
       $fieldofficerID=$fieldofficer[1];
       $data=explode(";",$request['payable']);
       $payable=$data[1];
       $month=explode(";",$request['month']);
       $month=$month[0];
      // echo"<pre>";print_r($month);die; 

       $year=$request['year'];
         $date=(Carbon::now());
        $explode=explode("-",$date);
         $fetchyear=$explode[0];
         $fechmonth=$explode[1];
         $fechmonth=$explode[1];
         $fechmonth=ltrim($fechmonth,0);
         if ($propertyID =='All' || $fieldofficerID =='All' || $payable=='All') {  
        }if($propertyID =='All' && $fieldofficerID =='All' && $payable=='All' && $month==$fechmonth && $year==$fetchyear){
      $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All','All','All',$fechmonth,$fetchyear,'All']);
      //echo"<pre>";print_r($tenantbalances);die;

    }else{
        $tenantbalances=DB::select("EXEC Pro_Uncleared_Units_Report ?,?,?,?,?,?",['All',$propertyID,$fieldofficerID,$month,$year,$payable]);

      }
           return view('tenantbalance.appendtenantbalances')
         ->withtenantbalances($tenantbalances);

    } 
    }
    public function getsingletenantbalance($tcode){
        // $data = Crypt::decrypt($tcode);
    // dd("f");
    try {
      $explodeurlvalues=explode("&&&", $tcode);
       
      $tenanttcode=Crypt::decrypt($explodeurlvalues[0]);
      $tenantname=Crypt::decrypt($explodeurlvalues[1]);
      $tenanttel=Crypt::decrypt($explodeurlvalues[2]);
      $tenantproperty=Crypt::decrypt($explodeurlvalues[3]);
      $tenantunit=Crypt::decrypt($explodeurlvalues[4]);
      $tenantmonth=Crypt::decrypt($explodeurlvalues[5]);
      $tenantyear=Crypt::decrypt($explodeurlvalues[6]);
      $date=(Carbon::now());
      $explode=explode("-", $date);
      $fetchyear=$explode[0];
      $fechmonth=$explode[1];
      $fetchday=$explode[2];
      
      $singletenant=DB::select("EXEC Pro_TenantBills_Load ?", [$tenanttcode]);
      return view('tenantbalance.singletenant')
           ->withtenantname($tenantname)
           ->withtenanttel($tenanttel)
           ->withtenantproperty($tenantproperty)
           ->withtenantunit($tenantunit)
           ->withtenantmonth($tenantmonth)
           ->withtenantyear($tenantyear)
           ->withsingletenant($singletenant);
    } catch (\Exception $th) {
     abort(404);
    }
           
        
    }

}
