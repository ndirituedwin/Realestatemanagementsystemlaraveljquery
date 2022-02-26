<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//  use Illuminate\Validation\Validator;
use Validator;
use Illuminate\Support\Facades\Session;

class AjaxLoginController extends Controller
{
    private $holddbconnection;
    private $defaultdbconnection;

    public function loginstafff(Request $request){
        $validator = Validator::make($request->all(),[
            'staffusername'=>'required|alpha_dash|max:50',
            'staffpassword'=>'required|numeric|min:7',
            'stafforganization'=>'required|string'
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $stafforganization=$request->stafforganization;

            try {
                $database=Client::where('client',$stafforganization)->first()->toArray();
                $dbnamedependingonclientname=$database['db_name'];
                 session(["dbname"=>$dbnamedependingonclientname]);
                // return response()->json(['status'=>1, 'msg'=>"found the organization"]);
            } catch (\Throwable $th) {
                return response()->json(['status'=>2, 'msg'=>"The organization $stafforganization could not be found"]);
            }

             try {
                 Client::configure($dbnamedependingonclientname);

                 try {
                    $staffusername=$request['staffusername'];
                    $staffpassword=$request['staffpassword'];
                    //  $getusername=DB::table('Users')->where('UserName',$username)->first();
                    $getuser=DB::table('Users')->where('UserName',$staffusername)
                    ->join('EmployeesDetails','Users.EmployeeNo','=','EmployeesDetails.EmployeeNo')->first();
                        if(!$getuser){
                            return response()->json(['status'=>6, 'msg'=>"User Not found"]);

                        }else{
                         try {
                             $getpassword=$getuser->IdNo;
                                if($getpassword!=$staffpassword){
                                    // if(!Hash::check($staffpassword,$getpassword)){
                                return response()->json(['status'=>6, 'msg'=>"Invalid login details"]);
                             }else{
                                 $request->session()->put('username',$staffusername);
                              return response()->json(['status'=>7, 'msg'=>"we are now taking you to the homepage"]);
                             }
                         } catch (\Throwable $th) {
                            return response()->json(['status'=>6, 'msg'=>"Invalid login details".$th->getMessage()]);
                         }
                        }


                 } catch (\Throwable $th) {
                    return response()->json(['status'=>4, 'msg'=>"user not found".$th->getMessage()]);
                 }
             } catch (\Throwable $th) {
                return response()->json(['status'=>3, 'msg'=>"database ". $this->defaultdbconnection." does not exist "]);
             }
        }
    }
    //sales agent
    protected function salesagentlogin(Request $request){

        $validator = Validator::make($request->all(),[
            'salesagentusername'=>'required|alpha_dash|max:50',
            'salesagentpassword'=>'required|numeric|min:7',
            'salesagentorganization'=>'required|string'
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            Session::put('salesagent',$request['salesagent']);
            $salesagentorganization=$request->salesagentorganization;
            try {
                $database=Client::where('client',$salesagentorganization)->first()->toArray();
                $dbnamedependingonclientname=$database['db_name'];
                 session(["dbname"=>$dbnamedependingonclientname]);
            } catch (\Throwable $th) {
                return response()->json(['status'=>2, 'msg'=>"The organization $salesagentorganization could not be found"]);
            }

             try {
                 Client::configure($dbnamedependingonclientname);

                 try {
                    $salesagentusername=$request['salesagentusername'];
                    $salesagentpassword=$request['salesagentpassword'];
                    // $getuser=DB::table('Users')->where('UserName',$salesagentusername)
                    // ->join('EmployeesDetails','Users.EmployeeNo','=','EmployeesDetails.EmployeeNo')->first();
                    $getuser=DB::table('PR_Client_Register')->where('ClientNo',$salesagentusername)->first();

                   if(!$getuser){
                            return response()->json(['status'=>6, 'msg'=>"User Not found"]);

                        }else{
                         try {
                             $getpassword=$getuser->IdNo;
                                if($getpassword!=$salesagentpassword){
                                return response()->json(['status'=>6, 'msg'=>"Invalid login details"]);
                             }else{
                                $request->session()->put('username',$salesagentusername);
                                $request->session()->put('salesagentname',$getuser->ClientName);
                                $request->session()->put('salesagentidno',$getpassword);
                                return response()->json(['status'=>7, 'msg'=>"we are now taking you to the homepage"]);
                             }
                         } catch (\Throwable $th) {
                            return response()->json(['status'=>6, 'msg'=>"Invalid login details".$th->getMessage()]);
                         }
                        }


                 } catch (\Throwable $th) {
                    return response()->json(['status'=>4, 'msg'=>"user not found".$th->getMessage()]);
                 }
             } catch (\Throwable $th) {
                return response()->json(['status'=>3, 'msg'=>"database ". $this->defaultdbconnection." does not exist "]);
             }
        }


    }
    //salesclient
      protected function salesclientlogin(Request $request){

        $validator = Validator::make($request->all(),[
            'salesclientno'=>'required|string',
            'salesclientpassword'=>'required|numeric|min:7',
            'salesclientorganization'=>'required|string'
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            Session::put('salesclient',$request['salesclient']);
            $salesclientorganization=$request->salesclientorganization;
            try {
                $database=Client::where('client',$salesclientorganization)->first()->toArray();
                $dbnamedependingonclientname=$database['db_name'];
                 session(["dbname"=>$dbnamedependingonclientname]);
            } catch (\Throwable $th) {
                return response()->json(['status'=>2, 'msg'=>"The organization $salesclientorganization could not be found"]);
            }

             try {
                 Client::configure($dbnamedependingonclientname);

                 try {
                    $salesclientno=$request['salesclientno'];
                    $salesclientpassword=$request['salesclientpassword'];
                    // $getuser=DB::table('Users')->where('UserName',$salesclientno)
                    // ->join('EmployeesDetails','Users.EmployeeNo','=','EmployeesDetails.EmployeeNo')->first();
                    //     if(!$getuser){
                    //         return response()->json(['status'=>6, 'msg'=>"User Not found"]);
                    //     }else{
                    $getuser=DB::table('PR_Client_Register')->where('ClientNo',$salesclientno)->first();
                    if(!$getuser){
                         return response()->json(['status'=>6, 'msg'=>"User Not found"]);

                    }else{
                         try {
                             $getpassword=$getuser->IdNo;
                                if($getpassword!=$salesclientpassword){
                                return response()->json(['status'=>6, 'msg'=>"Invalid login details"]);
                             }else{
                                $request->session()->put('username',$salesclientno);
                                $request->session()->put('companynanmee',$dbnamedependingonclientname);
                                $request->session()->put('salesclientrecid',$getuser->Recid);
                                $request->session()->put('salesclientname',$getuser->ClientName);
                                $request->session()->put('salesclientidno',$getpassword);

                                return response()->json(['status'=>7, 'msg'=>"we are now taking you to the homepage"]);
                             }
                         } catch (\Throwable $th) {
                            return response()->json(['status'=>6, 'msg'=>"Invalid login details".$th->getMessage()]);
                         }
                        }


                 } catch (\Throwable $th) {
                    return response()->json(['status'=>4, 'msg'=>"user not found".$th->getMessage()]);
                 }
             } catch (\Throwable $th) {
                return response()->json(['status'=>3, 'msg'=>"database ". $this->defaultdbconnection." does not exist "]);
             }
        }


    }
    //landlord login
    public function loginlandlord(Request $request){
        Session::put('page', "llblock");
        $validatorr=Validator::make($request->all(),[
            'useraccount'=>'required|string',
            'landlordpassword'=>'required|numeric|min:7',
            'landlordorganization'=>'required|string',
        ]);
        if(!$validatorr->passes()){
            return response()->json(['status'=>8, 'error'=>$validatorr->errors()->toArray()]);
        }else{
            try{
                $lldb=Client::where('client',$request['landlordorganization'])->first()->toArray();
                $dbdependingonlandlordname=$lldb['db_name'];
                Session::put('landlorddb',$dbdependingonlandlordname);
                   }catch(\Throwable $th){
                     return response()->json(['status'=>9,'msg'=>"The Organization ".$request['landlordorganization']. " does not exist"]);
                }
                try {
                    Client::configure(Session::get('landlorddb'));
                     try {
                     $useraccount=$request['useraccount'];
                    //   $getlandlord=DB::select("SELECT*from landlord where landlord_id='$useraccount'");//->where(['UserName'=>$request['username']])->first();
                    $getlandlord=DB::table('landlord')->where('landlord_id',$useraccount)->first();
                    // echo"<pre>";print_r($getlandlord);die;
                     if(!$getlandlord){
                           return response()->json(['status'=>12,"landlord with code $getlandlord->$useraccount could not be found "]);
                         }
                        //  $dd=$getlandlord[0];
                        //  $jsondecode=json_decode(json_encode($dd),true);
                          $getidnumber=$getlandlord->idnumber;
                          if($getidnumber !==$request['landlordpassword']){
                            return response()->json(['status'=>13,'msg'=>"Invalid Login details"]);
                           }else{
                               $request->session()->put('landlordcode',$request['useraccount']);
                            //    return redirect('/landlordhomepage');
                               return response()->json(['status'=>14,'msg'=>"Good to go"]);
                           }

                      } catch (\Throwable $th) {
                          return response()->json(['status'=>11,'msg'=>"User not found".$th->getMessage()]);
                      }
                 } catch (\Throwable $th) {
                    return response()->json(['status'=>10,'msg'=>"database ". $this->defaultdbconnection." does not exist "]);
                }

        }


    }
    public function logintenant(Request $request){
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
            'idnumber'=>'required|numeric|min:7',
            'tenant_organization'=>'required|string',
        ]);
        if(!$validatorr->passes()){
            return response()->json(['status'=>15, 'error'=>$validatorr->errors()->toArray()]);
        }else{


          try {
               $clientdb=Client::where('client',$request['tenant_organization'])->first();
               $storeclientdb=$clientdb['db_name'];
               Session::put('clientdatabase',$storeclientdb);
               try {
                    Client::configure($storeclientdb);


                    try {
                        $user=DB::table('Tenants')->where('idno',$request['idnumber'])->where('t_code', $request['t_code'])->first();
                         if(!$user){
                             return response()->json(['status'=>19,'msg'=>"incorrect login details"]);
                         }
                               if($user->idno==0|| $user->idno==''){
                                return response()->json(['status'=>20,'msg'=>"could not sign you in with those details"]);
                        }else{
                            $request->session()->put('loggedintenantcode', $user->t_code);
                            $loggedinusertcode=Session::get("loggedintenantcode");
                            $request->session()->put('loggedintenantidno', $user->idno);
                            $request->session()->put('loggedintenantname', $user->t_name);
                            $request->session()->put('loggedintenantproperty', $user->Property);
                            $request->session()->put('loggedintenantunit', $user->Unit);

                        // return redirect('/loggedtenant/statement');
                        return response()->json(['status'=>21,'msg'=>"Good to go"]);

                        }
                    } catch (\Throwable $th) {
                        // return back()->withdanger("failed");
                        return response()->json(['status'=>18,'msg'=>'failed'.$th->getMessage()]);
                    }


               } catch (\Throwable $th) {
                return response()->json(['status'=>17,'msg'=>"An error occurred during configuration ".$th->getMessage()]);

               }

            } catch (\Throwable $th) {
              return response()->json(['status'=>16,'msg'=>"The organization $request->tenant_organization  could not be found".$th->getMessage()]);
          }
        }


    }


}