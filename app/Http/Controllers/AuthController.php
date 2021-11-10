<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Client;
// use App\Http\Controllers\Foo;
use Illuminate\Http\Request;
use App\Http\Controllers\Foo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

  private $holddbconnection;
  private $defaultdbconnection;



  public function home()
  {
  return view('auth.logo');

  }
    public function getlogin(){
            return view('login');
       }

    public function postlogin(Request $request){

        $this->validate($request,[
            'staffusername'=>'required|alpha_dash|max:50',
            'staffpassword'=>'required|string|min:6',
            'stafforganization'=>'required|string'
        ]);

      try{
        $database=Client::where('client',$request['stafforganization'])->first()->toArray();
        $dbnamedependingonclientname=$database['db_name'];
         session(["dbname"=>$dbnamedependingonclientname]);

           }catch(\Throwable $th){
               //dd($th);
         return back()->withdanger("The Organization ".$request['organization']. " does not exist".$th);
      }
      try {
         Client::configure($dbnamedependingonclientname);

          try {

          $username=$request['staffusername'];
          // $getuser=DB::table('Users')->where('UserName',$username)->first();
          $getuser=DB::table('Users')->where('UserName',$username)
          ->join('EmployeesDetails','Users.EmployeeNo','=','EmployeesDetails.EmployeeNo')->first();
                if(!$getuser){
                return back()->withdanger("Username could not be found");
              }
            //   dd($getuser);
             try {
                $getpassword=$getuser->IdNo;
                    if($request['staffpassword']!=$getpassword){
                  return back()->withdanger("Invalid login details");
                 }
                 dd($getuser);
                   $request->session()->put('username',$request['staffusername']);
                return redirect('/homepage');
             } catch (\Throwable $th) {
                  dd($th->getMessage());
             }

           } catch (\Throwable $th) {
               dd($th->getMessage());
               return back()->withdanger("User not found ");
           }
      } catch (\Throwable $th) {
        dd($th->getMessage());

      return back()->withdanger("database ". $this->defaultdbconnection." does not exist ");
      }
    }
    public function postloginlandlord(Request $request){
        Session::put('page', "llblock");
        $this->validate($request,[
            'useraccount'=>'required|string',
            'password'=>'required|string',
            'landlordorganization'=>'required|string',
        ]);
         try{
            $lldb=Client::where('client',$request['landlordorganization'])->first()->toArray();
            $dbdependingonlandlordname=$lldb['db_name'];
            Session::put('landlorddb',$dbdependingonlandlordname);
               }catch(\Throwable $th){
              return back()->withdanger("The Organization ".$request['landlordorganization']. " does not exist".$th->getMessage());
          }
          try {
             Client::configure(Session::get('landlorddb'));
              try {
              $useraccount=$request['useraccount'];

              $getlandlord=DB::select("SELECT*from landlord where landlord_id='$useraccount'");//->where(['UserName'=>$request['username']])->first();
              if(!$getlandlord){
                    return back()->withdanger("landlord with code $getlandlord->$useraccount could not be found ");
                  }
                  $dd=$getlandlord[0];
                  $jsondecode=json_decode(json_encode($dd),true);
                   $getidnumber=$jsondecode['idnumber'];
                   if($getidnumber !==$request['password']){
                     return back()->withdanger("Invalid login details");
                    }

                    $request->session()->put('landlordcode',$request['useraccount']);
                    return redirect('/landlordhomepage');
               } catch (\Throwable $th) {
                   return back()->withdanger("User not found ");
               }
          } catch (\Throwable $th) {
            return back()->withdanger("database ". $this->defaultdbconnection." does not exist ");
          }
    }
    public function landlordhomeage(){
      Session::put('page','monthytransactions');
        try {
            $landlordname=Session::get('landlorddb');
             Client::configure($landlordname);
             $landlordcode=Session::get('landlordcode');
           //  dd($landlordcode);
           $companydetails=DB::select("EXEC Sacco_CompanyName");
           $companyname=$companydetails[0]->CompanyName;
           Session::put('landlordkmpname',$companyname);
           $landlordproperties=DB::select("EXEC Pro_Load_Landlord_Properties ?",[$landlordcode]);
             return view('landlordlogin.landlordhomepage')
             ->withcompanyname($companyname)
            ->withlandlordproperties($landlordproperties);
        } catch (\Throwable $th) {
            return back()->withdanger("failed".$th->getMessage());
        }
    }
    public function loadpayableonpropertychange(Request $request){
        try {
            $landlordbname=Session::get('landlorddb');
            Client::configure($landlordbname);
            $landlordcode=Session::get('landlordcode');
            if($request->ajax()){
                $landlordpropertyid=$request['landlordpropertyid'];
             $landlordpropertypayables=DB::select("EXEC Pro_LoadPropertyPayables ?",[$landlordpropertyid]);
                //echo"<pre>";print_r($landlordpropertypayables);die;
                 return view('landlordlogin.appendlandlordpayablesonpropertychange')->withpropertypayables($landlordpropertypayables);
            }

        } catch (\Throwable $th) {
            return back()->withdanger("an error occurred while loading payables".$th->getMessage());
        }

    }
    public function loggedlandlordrecords(Request $request){
        try {
            $landlordbname=Session::get('landlorddb');
            Client::configure($landlordbname);
            $landlordcode=Session::get('landlordcode');
                     if($request->ajax()){
                         $landlordpropertyid=$request['landlordpropertyid'];
                         $landlordpayable=$request['landlordpayable'];
                         $explodemonth=explode(';',$request['landlordmonth']);
                         $landlordmonth=$explodemonth[0];
                         $landlordyear=$request['landlordyear'];
                         //echo "<pre>";print_r($landlordpropertyid);die;
                          $statement=DB::select("EXEC Pro_View_ProTransactions_Property ?,?,?,?",[$landlordmonth,$landlordyear,$landlordpropertyid,$landlordpayable]);
                             $statement=json_decode(json_encode($statement),true);
                           // echo"<pre>";print_r($statement);die;
                          return view('landlordlogin.appendlandlordstatements')->withstatements($statement);


                     }
        } catch (\Throwable $th) {
            return back()->withdanger("an error occured while fetching records ".$th->getMessage());
        }

    }
    public function fetchstatementonmonthselect(Request $request)
    {
          try {
            $landlordbname=Session::get('landlorddb');
            Client::configure($landlordbname);
            if($request->ajax()){
            //    echo"<pre>";print_r($request->all());die;
                $month=explode(';',$request['month']);
                $month=$month[0];
                $year=$request['year'];
                $property=$request['property'];
                $payable=$request['payable'];
                $statement=DB::select("EXEC Pro_View_ProTransactions_Property ?,?,?,?",[$month,$year,$property,$payable]);
                 $statement=json_decode(json_encode($statement),true);
               // echo"<pre>";print_r($statement);die;
                 return view('landlordlogin.appendlandlordstatements')->withstatements($statement);
            }
          } catch (\Throwable $th) {
            return back()->withdanger("an error occurred ".$th->getMessage());
          }
    }

public function fetchstatementonyearselect(Request $request){
               try {
                $landlordbname=Session::get('landlorddb');
                Client::configure($landlordbname);
                if($request->ajax()){

                $month=explode(';',$request['month']);
                $month=$month[0];
                $year=$request['year'];
                $property=$request['property'];
                $payable=$request['payable'];
                $statement=DB::select("EXEC Pro_View_ProTransactions_Property ?,?,?,?",[$month,$year,$property,$payable]);
                 $statement=json_decode(json_encode($statement),true);
               // echo"<pre>";print_r($statement);die;
                 return view('landlordlogin.appendlandlordstatements')->withstatements($statement);


             }
               } catch (\Throwable $th) {
                   return back()->withdanger("an error occured while retrieving statement based on year ".$th->getMessage());
               }
}
    public function fetchstatementonpayableselect(Request $request)
    {
        try {
            $landlordbname=Session::get('landlorddb');
            Client::configure($landlordbname);
            if($request->ajax()){

            $month=explode(';',$request['month']);
            $month=$month[0];
            $year=$request['year'];
            $property=$request['property'];
            $payable=$request['payable'];
            // echo"<pre>";print_r($payable);die;

            $statement=DB::select("EXEC Pro_View_ProTransactions_Property ?,?,?,?",[$month,$year,$property,$payable]);
             $statement=json_decode(json_encode($statement),true);
           // echo"<pre>";print_r($statement);die;
             return view('landlordlogin.appendlandlordstatements')->withstatements($statement);


         }
           } catch (\Throwable $th) {
               return back()->withdanger("an error occured while retrieving statement based on payable ".$th->getMessage());
           }
    }
    public function generatelandlordpdf(Request $request){
        try {
            $landlordbname=Session::get('landlorddb');
            Client::configure($landlordbname);
            // $this->validate($request,[
            //     'landlordpropertyselect'=>'required',
            //     'landlordonpropayableselect'=>'required',
            //     'landlordmonthselect'=>'required',
            //     'landlordyearselect'=>'required'

            // ]);
            $validator=Validator::make($request->only([ 'landlordpropertyselect'
            ,'landlordonpropayableselect','landlordmonthselect','landlordyearselect']),[
              'landlordpropertyselect'=>'required',
              'landlordonpropayableselect'=>'required',
              'landlordmonthselect'=>'required',
              'landlordyearselect'=>'required'          ]);

            if($validator->fails()){
              // return back()->withstaffinfo("Empty");

              return back()->withstaffdanger("Validation failed, one or more empty fields ");
            }
            $month=explode(';',$request['landlordmonthselect']);
            $month=$month[0];
            $year=$request['landlordyearselect'];
            $property=$request['landlordpropertyselect'];
            $payable=$request['landlordonpropayableselect'];

            $statement=DB::select("EXEC Pro_View_ProTransactions_Property ?,?,?,?",[$month,$year,$property,$payable]);
             $statement=json_decode(json_encode($statement),true);
             if(empty($statement)){
               return back()->withstaffinfo("Empty");
             }
             $pdf = App::make('dompdf.wrapper');
             $pdf->loadHtml(view('landlordlogin.landlordstmtpdf')->withstatements($statement));
           return $pdf->stream();
         } catch (\Throwable $th) {
            return back()->withdanger("an error occurred while generating landlord statement ".$th->getMessage());
        }
    }
    public function postlogintenant(Request $request ){
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
       ;
      $validatorr=Validator::make($request->all(),[
            't_code'=>'required|string',
            'idnumber'=>'required|numeric',
            'tenant_organization'=>'required|string',
        ]);
        if(!$validatorr->passes()){
            return back()->withdanger("broken rules");

            // return response()->json(['status'=>15, 'error'=>$validatorr->errors()->toArray()]);
        }else{


          try {
               $clientdb=Client::where('tenant_organization',$request['tenant_organization'])->first();
               $storeclientdb=$clientdb['tenant_organization'];
               Session::put('clientdatabase',$storeclientdb);
               try {
                    Client::configure($storeclientdb);


                    try {
                        $user=DB::table('Tenants')->where('idno',$request['idnumber'])->where('t_code', $request['t_code'])->first();
                         if(!$user){
                            //  return response()->json(['status'=>19,'msg'=>"incorrect login details"]);
                             return back()->withdanger("could not sign you in with those details");

                         }
                               if($user->idno==0|| $user->idno==''){
                                return back()->withdanger("could not sign you in with those details");

                                // return response()->json(['status'=>20,'msg'=>"could not sign you in with those details"]);
                        }else{
                            $request->session()->put('loggedintenantcode', $user->t_code);
                            $loggedinusertcode=Session::get("loggedintenantcode");
                            $request->session()->put('loggedintenantidno', $user->idno);
                            $request->session()->put('loggedintenantname', $user->t_name);
                            $request->session()->put('loggedintenantproperty', $user->Property);
                            $request->session()->put('loggedintenantunit', $user->Unit);

                        return redirect('/loggedtenant/statement');
                        // return response()->json(['status'=>21,'msg'=>"Good to go"]);

                        }
                    } catch (\Throwable $th) {
                        return back()->withdanger("failed");
                        // return response()->json(['status'=>18,'msg'=>'failed']);
                    }


               } catch (\Throwable $th) {
                // return response()->json(['status'=>17,'msg'=>"An error occurred during configuration ".$th->getMessage()]);
                return back()->withdanger("An error occurred during configuration ".$th->getMessage());

               }

            } catch (\Throwable $th) {
                // return response()->json(['status'=>16,'msg'=>"The organization $request->tenant_organization  could not be found".$th->getMessage()]);
                return back()->withdanger("Organization not found");
            }
        }


    }

        //after the tenant logs in they are redirected here
    public function loggedtenantstatement(){
      try {
        Client::configure(Session::get('clientdatabase'));
        $companydetails=DB::select("EXEC Sacco_CompanyName");
        $companyname=$companydetails[0]->CompanyName;
             session::put('companynanmeet',$companyname);
        return view('tenantlogin.loggedintenantdetails')
        ->withloggedinusertcode(Session::get("loggedintenantcode"))
        ->withloggedintenantname(Session::get("loggedintenantname"))
        ->withloggedintenantproperty(Session::get("loggedintenantproperty"))
        ->withloggedintenantunit(Session::get("loggedintenantunit"));
      } catch (\Throwable $th) {
        return back()->withdanger("failed ".$th->getMessage());

      }
    }
    public function loggedtenantpreviewstatement(Request $request){
      try {
        if($request->ajax()){
            Client::configure(Session::get('clientdatabase'));
            $loggedintenantcode=Session::get("loggedintenantcode");
            $datefrom=$request['datefrom'];
            $tenantstatement=DB::select("EXEC Pro_Tenant_Stmt ?,?,?,?",[$request['t_code'],$request['datefrom'],$request['dateto'],Session::get("loggedintenantname")]);
           // echo"<pre>";print_r($tenantstatement);die;
           $companydetails=DB::select("EXEC Sacco_CompanyName");
           $address=$companydetails[0]->Address1;
           $companyname=$companydetails[0]->CompanyName;

           $phonenumber=$companydetails[0]->PhoneNumber;
           $email=$companydetails[0]->Email;
           $slogan=$companydetails[0]->Slogan;
            return view ('tenantlogin.appendloggedtenantstmt')
            ->withtenants($tenantstatement)
            ->withaddress($address)
            ->withcompanyname($companyname)
            ->withphonenumber($phonenumber)
            ->withemail($email)
            ->withslogan($slogan)
            ->withlastyear($request['datefrom'])
            ->withpropertyid(Session::get("loggedintenantproperty"))
            ->withtcode(Session::get("loggedintenantcode"))
            ->withunitid(Session::get("loggedintenantunit"))
            // ->withrealbal($realba)
            ->withtenantname(Session::get("loggedintenantname"))
            ->withcdate($request['dateto']);
                    }
      } catch (\Throwable $th) {
        return back()->withdanger("failed");
      }
    }
    public function loggedtenantgeneratepdf(Request $request){
      try {
        Client::configure(Session::get('clientdatabase'));

       $this->validate($request,[
           'loggedtenantcode'=>'required|string',
           'datefrom'=>'required|date',
           'dateto'=>'required|date',
       ]);
       $companydetails=DB::select("EXEC Sacco_CompanyName");
       $address=$companydetails[0]->Address1;
       $companyname=$companydetails[0]->CompanyName;

       $phonenumber=$companydetails[0]->PhoneNumber;
       $email=$companydetails[0]->Email;
       $slogan=$companydetails[0]->Slogan;

       $tenantstatement=DB::select("EXEC Pro_Tenant_Stmt ?,?,?,?",[$request['loggedtenantcode'],$request['datefrom'],$request['dateto'],Session::get("loggedintenantname")]);
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHtml(view('tenantlogin.loggedtenantstmtpdf')
       ->withtenants($tenantstatement)
       ->withaddress($address)
       ->withcompanyname($companyname)
       ->withphonenumber($phonenumber)
       ->withemail($email)
       ->withslogan($slogan)
       ->withlastyear($request['datefrom'])
       ->withpropertyid(Session::get("loggedintenantproperty"))
       ->withtcode(Session::get("loggedintenantcode"))
       ->withunitid(Session::get("loggedintenantunit"))
       ->withtenantname(Session::get("loggedintenantname"))
       ->withcdate($request['dateto']));
       return $pdf->stream();
      } catch (\Throwable $th) {
        return back()->withdanger("failed");
      }


    }


    public function getwelcomepage(){
       try {
        $dbname=session("dbname");
        Client::configure($dbname);
        $companydetails=DB::select("EXEC Sacco_CompanyName");
        $companyname=$companydetails[0]->CompanyName;
             session::put('companynanmee',$companyname);
        return view('auth.homepage')->withcompanyname($companyname);
       } catch (\Throwable $th) {
         return back()->withdanger("failed ".$th->getMessage());
       }
    }
    public function verifyusername(Request $request){
        if($request->ajax()){
      //   echo"<pre>";print_r($request->all());die;

            $user=User::where('UserName',$request['username'])->first();
          if(!$user){
           return false;

          }else{
                 return true;



          }



    }
    }
    public function verifypassword(Request $request){
            if($request->ajax()){
              $user=User::where('UserName',$request['username'])->first();
              if(!$user){
                return false;
              }else{
                if(!Hash::check($request['password'],$user['UserPwd'])){
                  return false;
                }
                return true;
              }


            }
    }
    public function arrayPaginator($array,$request){
      // $page=Input::get('page',1);
      // $perPage=10;
      // $offset=($page * $perPage)- $perPage;
      // return new LengthAwarePaginator(array_slice($array,$offset,$perPage,true),count($array),$perPage,$page,
      // ['path'=>$request->url(),'query'=>$request->query()]);
    }
    public function homepage(Request $request)
    {
      try {
        $dbname=session("dbname");
        Client::configure($dbname);
     $properties=DB::select("EXEC Pro_AllActiveProperties");
            $categories=DB::select("EXEC selectcategories");
            $queryResults=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[':param1'=>'Vacant',':param2'=>'All',':param3'=>'All',':param4'=>'All']);
        return view('auth.home')
        ->withproperties($properties)
         ->withcategories($categories)
         ->withvacantunits($queryResults);
      } catch (\Throwable $th) {
        return back()->withdanger("failed ".$th->getMessage());
      }
        // return view('search', ['results' => $paginatedSearchResults]);
    }
    public function hoomepage(Request $request){
    $dbname=session("dbname");
    Client::configure($dbname);
    try {
            $properties=DB::select("EXEC Pro_AllActiveProperties");
        $categories=DB::select("EXEC selectcategories");
       $page=request('page',1);
       $pagesize=10;
       $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3,:param4",[':param1'=>'All',':param2'=>'All',':param3'=>'All',':param4'=>'All']);
         $offset=($page * $pagesize) - $pagesize;
         $data=array_slice($vacantunits,$offset,$pagesize,true);
         $paginator=new  LengthAwarePaginator($data,count($data),$pagesize,$page);

      //  dd($paginator);
        return view('auth.home')
     ->withproperties($properties)
      ->withcategories($categories)
      ->withvacantunits($paginator);

    } catch (\Throwable $th) {
        dd($th->getMessage());
        return back()->withdanger($th->getMessage());
    //   $request->session()->flush();
    //   return redirect()->route('login')->withdanger("Operation could not be completed ".$th->getMessage());
    }



}
    public function logout(Request $request){
   //   Auth::logout();
      $request->session()->flush();
      return redirect()->route('welcome');
    }

}