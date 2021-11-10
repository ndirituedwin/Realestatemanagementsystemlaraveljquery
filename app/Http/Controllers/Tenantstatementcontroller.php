<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Sabberworm\CSS\Value\Size;
class Tenantstatementcontroller extends Controller
{
    public function viewtenantstatement(){
    try {
        $dbname=session("dbname");
        Client::configure($dbname);
        $date=(Carbon::now());
        $explode=explode("-",$date);
       $properties=DB::select("EXEC Pro_AllActiveProperties");
       $tenantbalnces=DB::select("EXEC Pro_List_Active_Tenants_byProperty ?",['All']);
      return view('tenantbalance.tenantstatement')
      ->withproperties($properties)
      ->withtenants($tenantbalnces);
    } catch (\Throwable $th) {
        return back()->withdanger("failed");
    }
    }
    public function onpropertychanged(Request $request){
     try {
        $dbname=session("dbname");
        Client::configure($dbname);
        $date=(Carbon::now());
        $explode=explode("-",$date);
                    if($request->ajax()){
                        $property=explode(";",$request['property_id']);
                        $propertyID=$property[1];

                       $tenants=DB::select("EXEC Pro_List_Active_Tenants_byProperty ?",[$propertyID]);
                      return view ('tenantbalance.appendtenants')->withtenants($tenants);

                    }
     } catch (\Throwable $th) {
        return back()->withdanger("failed");

     }

    }
    public function maketenantstatement(Request $request){
                $this->validate($request,[
                    'property'=>'required|string',
                    'tenant'=>'required|string',
                    'datefrom'=>'required|date',
                    'dateto'=>'required|date',
                ]);
        $dbname=session("dbname");
        $username=session("username");
        Client::configure($dbname);
        $cdate=date('Y-m-d');
        $explode=explode("-",$cdate);
        $lastyear=$explode[0]-1;
        $month=$explode[1];
        $day=$explode[2];
        //first
        $lastyear.="-";
        $lastyear.=$month;
        $lastyear.="-";
        $lastyear.=$day;
        $tcode=explode(';',$request['tenant']);
        $t_code=$tcode[1];
           $propertyid=explode(';',$request['property']);
            $propertyid=$propertyid[1];
            $tenantdetails=$tcode[2];

          /*explode tenant details */
          $tenantdetails=explode('-',$tenantdetails);
          $unitid=$tenantdetails[1];
          $tenantname=$tenantdetails[2];

          $Balances=DB::select("SELECT  t_code,trandate,credit, debit,
        SUM(isnull(credit,0) - isnull(debit,0)) OVER (ORDER BY recid ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) as Balance
        FROM PropTransactions
        where t_code=? and trandate <? order by trandate /*and trandate <'2021-01-24' order by trandate*/",[$t_code,$request['datefrom']]);
    // echo "<pre>";print_r($Balances);die;
      $realba=0;
       foreach($Balances as $ba){
           $realba+=$ba->Balance;
       }

      $tenantstatement=DB::select("EXEC Pro_Tenant_Stmt ?,?,?,?",[$t_code,$request['datefrom'],$request['dateto'],$username]);
           $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml(view('tenantbalance.tenantstmtpdf')
            ->withtenants($tenantstatement)
            ->withlastyear($request['datefrom'])
            ->withpropertyid($propertyid)
          ->withrealbal($realba)
            ->withtcode($t_code)
            ->withunitid($unitid)
            ->withtenantname($tenantname)
            ->withcdate($request['dateto']));
            return $pdf->stream();

    }
    public function generatetenantstatement(Request $request){
       try {
        $dbname=session("dbname");
        $username=session("username");
        Client::configure($dbname);
        $cdate=date('Y-m-d');
        //dd($cdate);
        $explode=explode("-",$cdate);
        $lastyear=$explode[0]-1;
        $month=$explode[1];
        $day=$explode[2];
        //first
        $lastyear.="-";
        $lastyear.=$month;
        $lastyear.="-";
        $lastyear.=$day;
        if($request->ajax()){
            $tcode=explode(';',$request['t_code']);
            $t_code=$tcode[1];
            $tenantdetails=$tcode[2];
            $propertyid=explode(';',$request['property_id']);
            $propertyid=$propertyid[1];

            /*explode tenant details */
            $tenantdetails=explode('-',$tenantdetails);
            $unitid=$tenantdetails[1];
            $tenantname=$tenantdetails[2];
            $companydetails=DB::select("EXEC Sacco_CompanyName");
            $companyname=$companydetails[0]->CompanyName;
            $address=$companydetails[0]->Address1;
            $phonenumber=$companydetails[0]->PhoneNumber;
            $email=$companydetails[0]->Email;
            $slogan=$companydetails[0]->Slogan;

     $tenantstatement=DB::select("EXEC Pro_Tenant_Stmt ?,?,?,?",[$t_code,$request['datefrom'],$request['dateto'],$username]);
          return view ('tenantbalance.appendtenantstatement')
          ->withtenants($tenantstatement)
          ->withlastyear($request['datefrom'])
          ->withpropertyid($propertyid)
          ->withtcode($t_code)
          ->withemail($email)
      ->withslogan($slogan)
      ->withaddress($address)
      ->withcompanyname($companyname)
      ->withphonenumber($phonenumber)
          ->withunitid($unitid)
        //   ->withrealbal($realba)
          ->withtenantname($tenantname)
          ->withcdate($request['dateto']);
        }
       } catch (\Throwable $th) {
        return back()->withdanger("failed");

       }

    }
    public function makepdfforenant(Request $request){
       // dd($request);
       $this->validate($request,[
        'property'=>'required|string',
        'tenant'=>'required|string',
        'datefrom'=>'required|date',
           'dateto'=>'required|date',
       ]);
       try {
        $dbname=session("dbname");
       $username=session("username");
       Client::configure($dbname);
       $cdate=date('Y-m-d');
       $explode=explode("-",$cdate);
       $lastyear=$explode[0]-1;
       $month=$explode[1];
       $day=$explode[2];
       //first
       $lastyear.="-";
       $lastyear.=$month;
       $lastyear.="-";
       $lastyear.=$day;
           $tcode=explode(';',$request['tenant']);
           $t_code=$tcode[1];
           $tenantdetails=$tcode[2];
           $propertyid=explode(';',$request['property']);
           $propertyid=$propertyid[1];
           $companydetails=DB::select("EXEC Sacco_CompanyName");
           $address=$companydetails[0]->Address1;
           $companyname=$companydetails[0]->CompanyName;

           $phonenumber=$companydetails[0]->PhoneNumber;
           $email=$companydetails[0]->Email;
           $slogan=$companydetails[0]->Slogan;
           /*explode tenant details */
           $tenantdetails=explode('-',$tenantdetails);
           $unitid=$tenantdetails[1];
           $tenantname=$tenantdetails[2];
    $tenantstatement=DB::select("EXEC Pro_Tenant_Stmt ?,?,?,?",[$t_code,$request['datefrom'],$request['dateto'],$username]);
    $statement=json_decode(json_encode($tenantstatement),true);
    // dd($statement);
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHtml(view('tenantbalance.tenantstmtpdf')
    // return view ('tenantbalance.tenantstmtpdf')
         ->withtenants($statement)
         ->withlastyear($request['datefrom'])
         ->withpropertyid($propertyid)
         ->withtcode($t_code)
         ->withemail($email)
      ->withslogan($slogan)
      ->withaddress($address)
      ->withcompanyname($companyname)
      ->withphonenumber($phonenumber)
         ->withunitid($unitid)
       //   ->withrealbal($realba)
         ->withtenantname($tenantname)
         ->withcdate($request['dateto']));
         return $pdf->stream();


       } catch (\Throwable $th) {
           return back();
       }
    }

public function generate_pdf() {
    $pdf = App::make('dompdf.wrapper');
        $pdf->loadHtml("
        <div class='row' Style='margin-top:50px'>
        <div class='container'>
            <div class='col-md-2'></div>
            <div class='col-md-8'>
                 <h3><b>Demo Real estate</b></h3>
            </div>
            <div class='col-md-2'></div>
        </div>
        </div>'"
         );
        return $pdf->stream();
     //$pdf=PDF::loadView('tenantbalance.appendtenantstatement')->withtenants($tenantstatement);
    // return $pdf->download('certificate.pdf');
     //return $pdf->stream('certificate.pdf');
     //$pdf = App::make('dompdf.wrapper');

     // $pdf->loadHtml(view('tenantbalance.appendtenantstatement')->withtenants($tenantstatement));
    // return $pdf->stream();



        // $pdf=PDF::loadView('tenantbalance.appendtenantstatement')->setPaper('a4','portrait');
        // //return $pdf->download('certificate.pdf');

       // return $pdf->stream('certificate.pdf');
}
}