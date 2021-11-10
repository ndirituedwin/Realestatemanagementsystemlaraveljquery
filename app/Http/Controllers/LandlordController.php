<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Models\Client;
use Mpdf\Utils\Arrays;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use PHPUnit\Framework\Functions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LandlordController extends Controller
{
    public function getlandlordstatement(Request $request)
    {
        $landlordname=Session::get('landlorddb');
            Client::configure($landlordname);
                    try {
                        // $tenantstatement=DB::select("SET NOCOUNT ON EXEC Pro_LandlordPayment_ReportB ?,?,?",["03","2021","A002 WAGITUNGO"]);
                        // echo"<pre>";print_r($tenantstatement);die;
            // $lastyear=Carbon::now()->year-1 ."/". Carbon::now()->month."/".Carbon::now()->day;

            $landlordcode=Session::get('landlordcode');
            $companydetails=DB::select("EXEC Sacco_CompanyName");
            $companyname=$companydetails[0]->CompanyName;
            $address=$companydetails[0]->Address1;
            $companyname=$companydetails[0]->CompanyName;
            $phonenumber=$companydetails[0]->PhoneNumber;
            $email=$companydetails[0]->Email;
            $slogan=$companydetails[0]->Slogan;
            $date=date('M Y');
            $landlordproperties=DB::select("EXEC Pro_Load_Landlord_Properties ?",[$landlordcode]);
            return view('landlordlogin.landlordstmt')
             ->withcompanyname($companyname)
             ->withaddress($address)
             ->withphonenumber($phonenumber)
             ->withemail($email)
             ->withslogan($slogan)
             ->withdate($date)
            ->withlandlordproperties($landlordproperties);
        } catch (\Throwable $th) {
            return back()->withdanger("failed".$th->getMessage());
        }
    }
    public function previewstmt( Request $request){
        $landlordname=Session::get('landlorddb');
        Client::configure($landlordname);
        $landlordcode=Session::get('landlordcode');


        try {

                 if($request->ajax()){
                           // $property=$request['property'];
                           $monthH=explode(";",$request['month']);
                           $month=$monthH[0];
                           $MONTH2=$monthH[1];
                            // echo"<pre>";print_r($MONTH2);die;
                           $propertyid=$request['property'];
                           $year=$request['year'];
                           $companydetails=DB::select("EXEC Sacco_CompanyName");
                           $address=$companydetails[0]->Address1;
                           $companyname=$companydetails[0]->CompanyName;
                           $phonenumber=$companydetails[0]->PhoneNumber;
                           $email=$companydetails[0]->Email;
                           $slogan=$companydetails[0]->Slogan;
                           $date=date('M Y');
                           $fetchalllandlordstmt=$this->fetchtransactions($month,$year,$propertyid);
                           $fetchalllandlorddeductions=$this->deductions($month,$year,$propertyid);
                        //    echo"<pre>";print_r($fetchalllandlorddeductions);die;

                          $name=DB::table('landlord')->where('landlord_id',$landlordcode)->first();
                           $name=json_decode(json_encode($name),true);
                        return view("landlordlogin.appendllstmt")
                        ->withcompanyname($companyname)
                        ->withmonth2($MONTH2)
                        ->withyear2($year)
                        ->withaddress($address)
                        ->withlastyear($request['datefrom'])
                        ->withcdate($request['dateto'])
                        ->withlandlordnumber($propertyid)
                        ->withphonenumber($phonenumber)
                        ->withemail($email)
                        ->withslogan($slogan)
                        ->withname($name)
                        ->withdate($date)
                        ->withlandlordcode($landlordcode)
                        ->withlandlordstmts($fetchalllandlordstmt)
                        ->withlandlorddeductions($fetchalllandlorddeductions);
                       }

                   } catch (\Throwable $th) {
                       return response()->json(['status'=>0,'msg'=>"An error occurred during statement preview ".$th->getMessage()]);
                   }

    }
    private function fetchtransactions($month,$year,$propertyid){
        try {

            $fetchalllandlordstmt=DB::select("SET NOCOUNT ON EXEC Pro_LandlordPayment_ReportB ?,?,?",[$month,$year,$propertyid]);
            $fetchalllandlordstmt=json_decode(json_encode($fetchalllandlordstmt),true);
             return $fetchalllandlordstmt;
        } catch (\Throwable $th) {
            return response()->json(['status'=>2,'msg'=>'an error occurred'.$th->getMessage()]);
        }
    }
    private function deductions($month,$year,$propertyid){
         try {
            $fetchalllandlorddeductions=DB::select("SET NOCOUNT ON  EXEC Pro_LandlordPayment_Report_Sub ?,?,?",[$month,$year,$propertyid]);
            $fetchalllandlorddeductions=json_decode(json_encode($fetchalllandlorddeductions),true);
             return $fetchalllandlorddeductions;

         } catch (\Throwable $th) {
            return response()->json(['status'=>277,'msg'=>'an error occurred'.$th->getMessage()]);
         }
    }
    public function lltransactions(Request $request){

         $this->validate($request,[
            'ladlorstmtselect'=>'required',
            'landlordstmtmonthselect'=>'required',
            'landlordstmtyearselect'=>'required',
         ]);
        // dd($request->all());
         try {
            $landlordname=Session::get('landlorddb');
            Client::configure($landlordname);
            $landlordcode=Session::get('landlordcode');
            $monthH=explode(";",$request['landlordstmtmonthselect']);
            $month=$monthH[0];
            $MONTH2=$monthH[1];
             // echo"<pre>";print_r($MONTH2);die;
            $propertyid=$request['ladlorstmtselect'];
            $year=$request['landlordstmtyearselect'];
            $companydetails=DB::select("EXEC Sacco_CompanyName");
            $address=$companydetails[0]->Address1;
            $companyname=$companydetails[0]->CompanyName;
            $phonenumber=$companydetails[0]->PhoneNumber;
            $email=$companydetails[0]->Email;
            $slogan=$companydetails[0]->Slogan;
            $date=date('M Y');
            $fetchalllandlorddeductions=$this->deductions($month,$year,$propertyid);
            $deductionsE=[];
            $ldeductions=[];
            foreach ($fetchalllandlorddeductions as $key => $value) {
                if ($value['Type']==="E") {
                    array_push($deductionsE, ['Payable'=>$value['Payable'],'Amount'=>$value['Amount']]);
                }else{
                array_push($ldeductions,['Payable'=>$value['Payable'],'Expr1001'=>$value['Expr1001'],'Amount'=>$value['Amount']]);
               }
            }
            
           $fetchalllandlordstmt=$this->fetchtransactions($month,$year,$propertyid);
            $name=DB::table('landlord')->where('landlord_id',$landlordcode)->first();
            $name=json_decode(json_encode($name),true);
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml(view('landlordlogin.llpdftransactions')
            ->withcompanyname($companyname)
            ->withlandlordnumber($propertyid)
            ->withmonth2($MONTH2)
         ->withyear2($year)
         ->withaddress($address)
         ->withlastyear($request['datefrom'])
         ->withcdate($request['dateto'])
         ->withphonenumber($phonenumber)
         ->withemail($email)
         ->withslogan($slogan)
         ->withname($name)
         ->withdate($date)
         ->withlandlordcode($landlordcode)
         ->withldeductions($ldeductions)
          ->withlandlorddeductions($deductionsE)
         ->withlandlordstmts($fetchalllandlordstmt));
         return $pdf->stream();
         } catch (\Throwable $th) {
             return back()->withinfo('An error occurred during pdf generaton'.$th->getMessage());
         }





       }
}