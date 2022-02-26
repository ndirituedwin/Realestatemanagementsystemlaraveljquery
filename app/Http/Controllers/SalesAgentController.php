<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class SalesAgentController extends Controller
{
    protected function clientstatement(){
        // dd("f");
        $this->dbconnect();
      try {
        // $companydetails=DB::select("EXEC Sacco_CompanyName");

        $loadprojects=DB::select('EXEC [PR_Load_Clients4Statement]');
        return view('salesagent.client')
        // ->withcompanydetails($companydetails)
        ->withclientss($loadprojects);
      } catch (\Throwable $th) {
        //   return back();
      }
    }
    protected function projectstatus(){

       $this->dbconnect();
       try {
           $loadprojects=DB::select("EXEC [PR_LoadProjects]");
           $projectstatuses=DB::select("EXEC PR_LoadUnitDetails_Reports ?,?",['All','All']);
           return view('salesagent.projectstatus')
           ->withprojectstatuses($projectstatuses)
           ->withprojects($loadprojects);
       } catch (\Throwable $th) {
          return back();
       }
    }
    private function dbconnect(){
        $dbname=session("dbname");
        $dbnme=Client::configure($dbname);
        return $dbname;
    }
protected function viewprojectstatus(Request $request){
    $this->dbconnect();

    if($request->ajax()){
            try {
                $projectstatuses=DB::select("EXEC PR_LoadUnitDetails_Reports ?,?",[$request['projectselect'],$request['projectstatuselect']]);
            return view('salesagent.appendprojectstatus')->withprojectstatuses($projectstatuses);
            } catch (\Throwable $th) {
                return response()->json(['status'=>400,'msg'=>'An error occured while fetching project statuses '.$th->getMessage()]);
            }
    }
}

protected function loadclientstatements(Request $request){
    $this->dbconnect();
    if($request->ajax()){
        $companydetails=DB::select("EXEC Sacco_CompanyName");
            //  dd($companydetails[0]->CompanyName);
    $clientstatements=DB::select("EXEC [PR_ClientStatements_Combined] ?",[$request['ClientNo']]);
    $result=json_decode(json_encode($clientstatements),true);
    $array=array(
   'ClientNo'=>'CL0001',
    'ClientName'=>"name 4",
    'ClientID'=>555,
    'Trandate'=>'2015/12/44',
    'VoucherNo'=>11,
    'Name'=>"name 888",
    'Dr'=>2500,
    'Cr'=>0,
    'Balance'=>122000,
    'UnitNo'=>22,
    'Description'=>"description"
   );
   $array1=array(
       'ClientNo'=>'CL0001',
       'ClientName'=>"name 7",
       'ClientID'=>555,
       'Trandate'=>'2015/12/44',
       'VoucherNo'=>11,
       'Name'=>"pro 87",
       'Dr'=>2200,
       'Cr'=>1050,
       'Balance'=>10700,
       'UnitNo'=>22,
       'Description'=>"description"
      );
      $array2=array(
          'ClientNo'=>'CL00078',
           'ClientName'=>"ndiritu edwin",
           'ClientID'=>555,
           'Trandate'=>'2015/12/44',
           'VoucherNo'=>121,
           'Name'=>"pro 87",
           'UnitNo'=>225,
           'Dr'=>2221100,
           'Cr'=>122001,
           'Balance'=>10010,
           'Description'=>"description two"
          );
          $array3=array(
            'ClientNo'=>'CL0007873',
             'ClientName'=>"clinet three",
             'ClientID'=>65,
             'Trandate'=>'2015/12/44',
             'VoucherNo'=>11,
             'Name'=>"pro 87",
             'UnitNo'=>2245,
             'Dr'=>122112,
             'Cr'=>2555512,
             'Balance'=>12000,
             'Description'=>"description another"
            );
            $array4=array(
                'ClientNo'=>'CL0004',
                 'ClientName'=>"Name one",
                 'ClientID'=>55,
                 'Trandate'=>'2015/12/44',
                 'VoucherNo'=>1,
                 'Name'=>" Project 7",
                 'UnitNo'=>2,
                 'Dr'=>555565,
                 'Cr'=>1212,
                 'Balance'=>2544,
                 'Description'=>"description"
                );
                $array5=array(
                    'ClientNo'=>'CL00010',
                     'ClientName'=>"client number xx",
                     'ClientID'=>787,
                     'Trandate'=>'2015/12/44',
                     'VoucherNo'=>87,
                     'Name'=>"county 07",
                     'Dr'=>600,
                     'Cr'=>252,
                     'Balance'=>1212,
                     'UnitNo'=>74,
                     'Description'=>"description"
                    );

//    array_push($result,$array,$array1,$array2,$array3,$array4,$array5);
   array_push($result,$array);
$resultt=$this->_group_by($result,'Name','UnitNo');
    return view('salesagent.appendclientstatements')->withcompanydetails($companydetails)
    ->withclientstatements($resultt);

    }
}
// function _group_by($array, $key) {
//     $return = array();
//     foreach($array as $val) {
//         $return[$val[$key]][] = $val;
//     }
//     return $return;
// }
function _group_by($array, $key1,$key2) {
    $return = array();
    foreach($array as $val) {
        $return[$val[$key1]][$val[$key2]][]  = $val;
    }
    return $return;
}
protected function salesagentpdf(Request $request){

    // dd($request->all());
    $this->validate($request,[
        'client'=>'required|integer',
    ]);
    // dd($request->all());
    try {
        $this->dbconnect();
     $companydetails=DB::select("EXEC Sacco_CompanyName");
        $clientstatements=DB::select("EXEC [PR_ClientStatements_Combined] ?",[$request['client']]);
        $result=json_decode(json_encode($clientstatements),true);
        $array=array(
            'ClientNo'=>'CL0001',
             'ClientName'=>"name 4",
             'ClientID'=>555,
             'Trandate'=>'2015/12/44',
             'VoucherNo'=>11,
             'Name'=>"name 888",
             'Dr'=>2500,
             'Cr'=>1500,
             'Balance'=>122000,
             'UnitNo'=>22,
             'Description'=>"description"
            );
            $array1=array(
                'ClientNo'=>'CL0001',
                'ClientName'=>"name 7",
                'ClientID'=>555,
                'Trandate'=>'2015/12/44',
                'VoucherNo'=>11,
                'Name'=>"pro 87",
                'Dr'=>2200,
                'Cr'=>1050,
                'Balance'=>10700,
                'UnitNo'=>22,
                'Description'=>"description"
               );
               $array2=array(
                   'ClientNo'=>'CL00078',
                    'ClientName'=>"ndiritu edwin",
                    'ClientID'=>555,
                    'Trandate'=>'2015/12/44',
                    'VoucherNo'=>121,
                    'Name'=>"pro 87",
                    'UnitNo'=>225,
                    'Dr'=>2221100,
                    'Cr'=>122001,
                    'Balance'=>10010,
                    'Description'=>"description two"
                   );
                   $array3=array(
                     'ClientNo'=>'CL0007873',
                      'ClientName'=>"clinet three",
                      'ClientID'=>65,
                      'Trandate'=>'2015/12/44',
                      'VoucherNo'=>11,
                      'Name'=>"pro 87",
                      'UnitNo'=>2245,
                      'Dr'=>122112,
                      'Cr'=>2555512,
                      'Balance'=>12000,
                      'Description'=>"description another"
                     );
                     $array4=array(
                         'ClientNo'=>'CL0004',
                          'ClientName'=>"Name one",
                          'ClientID'=>55,
                          'Trandate'=>'2015/12/44',
                          'VoucherNo'=>1,
                          'Name'=>" Project 7",
                          'UnitNo'=>2,
                          'Dr'=>555565,
                          'Cr'=>1212,
                          'Balance'=>2544,
                          'Description'=>"description"
                         );
                         $array5=array(
                             'ClientNo'=>'CL00010',
                              'ClientName'=>"client number xx",
                              'ClientID'=>787,
                              'Trandate'=>'2015/12/44',
                              'VoucherNo'=>87,
                              'Name'=>"county 07",
                              'Dr'=>600,
                              'Cr'=>252,
                              'Balance'=>1212,
                              'UnitNo'=>74,
                              'Description'=>"description"
                             );

            array_push($result,$array,$array1,$array2,$array3,$array4,$array5);
            $resultt=$this->_group_by($result,'Name','UnitNo');
    //    dd($resultt);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHtml(view('salesagent.salesagentclientspdff')->withcompanydetails($companydetails)
        // $pdf->loadHtml(view('salesagent.salesagentclientspdf')
        ->withclientstatements($resultt));
        return $pdf->stream();
    } catch (\Throwable $th) {
        dd($th);
        return back()->withinfo('An error occurred during pdf generaton'.$th->getMessage());

    }
}
}
