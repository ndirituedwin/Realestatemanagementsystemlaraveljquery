<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class discardedcontroller extends Controller
{
    //
    //DB::setDefaultConnection($config);
      //dd($config);
      //$db=($config['database']);

       // DB::purge($this->holddbconnection);
         //DB::reconnect($holddbconnection);
        // dd($this->holddbconnection);

        //$properties=DB::select("Select*from Users");
       //$properties=$holddbconnection->table("EXEC Pro_AllActiveProperties");
       //$properties=$holddbconnection->table("Select*from Users");
      // dd(DB::select(""));
     // $getuser=$holddbconnection->table('Users')->where(['UserName'=>$request['username']])->first();
      //$getuser=DB::select('Users')->where(['UserName'=>$request['username']])->first();
  //             dd(DB::select("SELECT*FROM Users"));
              // dd(DB::select("EXEC Pro_AllActiveProperties"));

              //  return back()->withdanger("correct");
           //   dd($holddbconnection);
      /*     if(!Auth::attempt($request->only(['username','password']))){
            return back()->withdanger('could not sign you in with those details');
         }else{

         }*/

       //  dd($properties);
         // $defaultdbconnection=config('database.connections.sqlsrv');
        //  $defaultdbconnection['database']=$dbnamedependingonclientname;
        //  config(['database.connections.second'=>$defaultdbconnection]);

        //  $holddbconnection=DB::connection('second');
        //   DB::purge('sqlsrv');
         //dd($getuser);
         /*
    if(!Auth::attempt($request->only(['username','password']))){
       return back()->withdanger('could not sign you in with those details');
    }else{
            return redirect()->route('home.beforerecords');

    }*/
  //dd("kj");


              //   $getuser=$this->holddbconnection->table('Users')->where(['UserName'=>$request['username']])->first();

}




/**another */
 //    $arr=array();
                        //    $sum_array = [];
                        //    $sum_monthlyarray=[];
                        //    $final_array = [];
                        //    $final_arraymonthly=[];
                        //     foreach($fetchalllandlordstmt as $key=>$item){
                        //          $arr[$item['payable'].' '.$item['Payable name']][$key]=$item;

                        //          if (key_exists($item['payable'], $sum_array)) {
                        //             $sum_array[$item['payable']] += $item['Arrears'];
                        //         } else {
                        //             $sum_array[$item['payable']] = $item['Arrears'];
                        //         }
                        //         if (key_exists($item['payable'], $sum_monthlyarray)) {
                        //             $sum_monthlyarray[$item['payable']] += $item['Monthly'];
                        //         } else {
                        //             $sum_monthlyarray[$item['payable']] = $item['Monthly'];
                        //         }
                        //         }
                        //         ksort($sum_array,SORT_NUMERIC);
                        //         ksort($sum_monthlyarray,SORT_NUMERIC);

                        //         foreach($sum_array as $key => $value) {
                        //             $final_array[] = ['payable' => $key, 'Arrears' => $value];
                        //         }
                        //         ksort($arr,SORT_NUMERIC);
                        //         ksort($final_array,SORT_NUMERIC);
                        /**end of another */