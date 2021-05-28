<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  
 

    public function getlogin(){
            return view('login');
       }
    public function postlogin(Request $request){

   $this->validate($request,[
        'username'=>'required|alpha_dash|max:50',
       'password'=>'required|string|min:6',
       'organization'=>'required|string'
    ]);
   
      try{
        $database=Client::where('client',$request['organization'])->first()->toArray();
        $dbnamedependingonclientname=$database['db_name'];

      }catch(\Throwable $th){
         return back()->withdanger("That Organization does not exist");
      }    
      try {
         //make a connection to the database selected
         $defaultdbconnection=config('database.connections.sqlsrv');
         $defaultdbconnection['database']=$dbnamedependingonclientname;
         config(['database.connections.second'=>$defaultdbconnection]);
         $holddbconnection=DB::connection('second');
       // dd($holddbconnection);
          try {
              $getuser=$holddbconnection->table('Users')->where(['UserName'=>$request['username']])->first();
              if(!$getuser){
                return back()->withdanger("incorrect username");
              }
               $getpassword=$getuser->UserPwd;
                if(!Hash::check($request['password'],$getpassword)){
                 return back()->withdanger("incorrect passsword");
                }
                return back()->withdanger("correct");
           //   dd($holddbconnection);
      /*     if(!Auth::attempt($request->only(['username','password']))){
            return back()->withdanger('could not sign you in with those details');
         }else{
                 return redirect()->route('home.beforerecords');
     
         }*/
           } catch (\Throwable $th) {
               dd($th);
           }           
      } catch (\Throwable $th) {
     // throw $th;
      dd("database  ".$defaultdbconnection." does not exist");
      }


/*
    if(!Auth::attempt($request->only(['username','password']))){
       return back()->withdanger('could not sign you in with those details');
    }else{
            return redirect()->route('home.beforerecords');

    }*/
  //dd("kj");
 
    
     
    }
    public function getwelcomepage(){
        return view('auth.homepage');
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
    public function homepage(Request $request){
           $properties=DB::select("EXEC Pro_AllActiveProperties");
       $categories=DB::select("EXEC selectcategories");
           $vacantunits=DB::select("EXEC Pro_UnitStatus_Report :param1,:param2,:param3",[':param1'=>'All',':param2'=>'All',':param3'=>'All',]);
           return view('auth.home')
           ->withproperties($properties)
           ->withcategories($categories)
           ->withvacantunits($vacantunits);
           
   
    }
    public function logout(){
      Auth::logout();
      return redirect()->route('welcome');
    }
}
