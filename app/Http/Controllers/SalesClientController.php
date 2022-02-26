<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SalesClientController extends Controller
{

    protected function welcome(){
        try {
            $this->dbconnect();

            $companydetails=DB::select("EXEC Sacco_CompanyName");
            $clientstatements=DB::select("EXEC [PR_ClientStatements_Combined] ?",[Session::get('salesclientrecid')]);
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
            // return view('salesagent.appendclientstatements')->withclientstatements($resultt);
            // dd($resultt);
            return view('salesclient.salesclient')->withcompanydetails($companydetails)->withclientstatements($resultt);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->withdanger("failed ".$th->getMessage());
        }

    }
    private function dbconnect(){
        $dbname=session("dbname");
        $dbnme=Client::configure($dbname);
        return $dbnme;
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
    protected function salesclientpdf(Request $request){
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
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml(view('salesclient.salesclientspdf')
            ->withcompanydetails($companydetails)
            ->withclientstatements($resultt));
            return $pdf->stream();
        } catch (\Throwable $th) {
            dd($th);
            return back()->withinfo('An error occurred during pdf generaton'.$th->getMessage());

        }
    }


    protected function salesclientvacantunits(){
        $this->dbconnect();
        $companydetails=DB::select("EXEC Sacco_CompanyName");
        $available="Available";
        // $ci=stripos('available',$available);
        $projectstatuses=DB::select("EXEC PR_LoadUnitDetails_Reports ?,?",['All',$available]);
        return view('salesclient.projectstatus')->withcompanydetails($companydetails)
        ->withprojectstatuses($projectstatuses);
    }
}