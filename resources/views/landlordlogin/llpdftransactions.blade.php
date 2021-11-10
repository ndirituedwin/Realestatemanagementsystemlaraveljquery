<!DOCTYPE html>
<html>
     <head>
         <title>Landlord statement</title>
         {{-- <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}"> --}}
         <style type="tex/css">
/*
         table,tr,td{
            border-bottom: 1px solid black;
         }
         table,tr,th{
            border-bottom: 1px solid black;
         } */

         #hg th{
             border-bottom: 1px solid black;
         }
         .container{
             margin-top: -40px;
         }
         .container4{
            margin-top: -40px;


         }

                .content-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }

                .content-table thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
                font-weight: bold;
                }

                .content-table th,
                .content-table td {
                padding: 12px 15px;
                }

                .content-table tbody tr {
                border-bottom: 1px solid #dddddd;
                }
                .content-table tbody tr td {
                border-bottom: 1px solid #dddddd;
                }

                .content-table tbody tr:nth-of-type(even) {
                /* background-color: #f3f3f3; */
                }

                .content-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
                }

                .content-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
                }



         </style>
        </head>
     <body>
         <br/>
         <div class="container">
          <p><h3 align="center"><b >{{($companyname)?$companyname:'' }}</b></h3></p>
            <p style="margin-top: -20px;" align="center"><i>{{($slogan)?$slogan:'' }}</i></p>
            <p style="margin-top: -14px;" align="center">{{($address)?$address:'' }}</p>
            <p  style="margin-top: -14px" align="center">Cell:{{($phonenumber)?$phonenumber:'' }}</p>
            <p  style="margin-top: -14px" align="center">Email:{{($email)?$email:'' }}</p>
            <p style="margin-top: -15px><h4" ><h6 style="margin-top: -16px;background-color: rgb(156, 146, 146);height: 2px;width: 100%;"></h4></p>
            <p  style="margin-top: -8px"><h3 align="center"><b> PROPERTY ACCOUNT STATEMENT</b></h3></p>

            {{-- <p  style="margin-top: -16px><h4" ><h6  align="center" style="color: black;margin-top: -1110px" > OWNER: {{ $landlordcode }} - {{ ($name['othername'])?$name['othername']:'' }} {{ ($name['surname'])?$name['surname']:'' }}</h6></p> --}}
                      <p style="margin-top: -15px><h4" ><h6 style="margin-top: -16px;background-color: rgb(156, 146, 146);height: 2px;width: 100%;"></h4></p>

            </div>
        <div class="container2">
            <table class="table" >
                <tbody>
                    <tr>
                        <td >Property L.r No :  </td>
                        <td  ><i>{{$landlordnumber}}</i></td>
                        <td></td>
                        <td></td>
                        <td></td>  <td></td>
                        <td></td>
                        <td></td>  <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Owner: {{ $landlordcode }} - {{ ($name['othername'])?$name['othername']:'' }} {{ ($name['surname'])?$name['surname']:'' }}</td>
                    </tr>

                </tbody>
            </table>
            {{-- <div ><p>Tenant Code:</p></div>
            <div class="tenantname"><p>Tenant Name:</p></div>
            <div ><p>Property:</p></div>
            <div class="tenantname"><p>Unit:</p></div> --}}
        </div>
        <div class="container3">

            <table class="table ">
                <tbody>
                    <tr>
                        <td>Payment period: {{$month2}} {{ $year2 }}</td>

                    </tr>
                </tbody>


            </table>
            <h6 style="margin-top:1px;background-color: rgb(56, 54, 54);height: 2px;"></h6>
        </div>
        {{-- <h6 style="margin-top:10px;margin-left: -10px;background-color: rgb(56, 54, 54);height: 2px;"></h6> --}}
         <?php
                   $arrears=0;
                   $landlordstmtsdisplay=[];
                    $sum_array = [];
                    $final_array = [];
                if(!empty($landlordstmts)){
                    foreach ($landlordstmts as $stmt) {
                        $landlordstmtsdisplay[$stmt['payable'].';;;'.$stmt['Payable name']][]=$stmt;
                   }
                }
               ?>

            <div class="container4">

                <table class="content-table">

                    <tr  id="hg" >
                    <th>Unit</th><th>Tenant</th><th>Arrears</th><th>Month Pay</th><th>Total expected</th><th>Amount paid</th><th>Balance</th>
                    </tr>
                    @if (!empty($landlordstmtsdisplay))
                @foreach ($landlordstmtsdisplay as $payable => $stmtss)
                @php
                    $explode=explode(';;;',$payable);
                    $payablecode=$explode[0];
                       $payablename=$explode[1];


                       $summarrearswithvacant=0;
                       $arrearsgrandtotalwithvacant=0;

                       $summonthpaywithvacant=0;
                       $monthpaygrandtotalwithvacant=0;

                       $summotalexpectedwithvacant=0;
                       $ttexpecetedgrandtotalwithvacant=0;

                       $summamountpaidwithvacant=0;
                       $amountpaidgrandtotalwithvacant=0;

                       $summbalancewithvacant=0;
                       $balancegrandtotalwithvacant=0;


                       $summarrearswithnovacant=0;
                       $arrearsgrandtotalwithnovacant=0;

                       $summonthpaywithnovacant=0;
                       $monthpaygrandtotalwithnovacant=0;

                       $summotalexpectedwithnovacant=0;
                       $ttexpecetedgrandtotalwithnovacant=0;

                       $summamountpaidwithnovacant=0;
                       $amountpaidgrandtotalwithnovacant=0;

                       $summbalancewithnovacant=0;
                       $balancegrandtotalwithnovacant=0;


                @endphp

                    <tr style="border: 1px solid black;">
                    <td colspan="7" class="text-info bg-warning" style="font-size: 20px" >{{ $payablename }}</td>
                    </tr>
                    @php
                    @endphp

                    @if (!empty($stmtss))
                    @php
                 $cvus="";
                  $PAYEMNTTO="";
                  $monthlycollectedorexpected="";
                    @endphp
                     @foreach ($stmtss as $single)
                     <tr >
                         @if (!empty($single))
                         <td>{{$single['unit_id']}}</td>
                         <td>{{$single['t_name']}}</td>
                         <td>{{$single['Arrears']}}</td>
                         <td>{{$single['Monthly']}}</td>
                         <td>{{$single['Expected']}}</td>
                         <td>{{$single['AmountPaid']}}</td>
                         <td>{{$single['Balance']}}</td>
                         @php
                         switch ($single['OwnerPayment']) {
                             case 'expected':
                             $monthlycollectedorexpected="Monthly Expected";

                                 break;
                              case 'collected':
                              $monthlycollectedorexpected="Monthly collected";
                                   break;
                             default:
                             $monthlycollectedorexpected="";
                                 break;
                         }
                         @endphp
                         @php
                             $cvus=$single['VacantUnits'];
                             $PAYEMNTTO=$single['Payment_To']
                         @endphp
                         @endif
                     </tr>
                     @endforeach
                     @php
                         $i=0;
                     @endphp
                     @foreach ($landlordstmts as $item)
                          @php
                              $i++
                          @endphp
                     @php

                     $arrearsgrandtotalwithvacant+=$item['Arrears'];
                       $monthpaygrandtotalwithvacant+=$item['Monthly'];
                       $ttexpecetedgrandtotalwithvacant+=$item['Expected'];
                       $amountpaidgrandtotalwithvacant+=$item['AmountPaid'];
                        $balancegrandtotalwithvacant+=$item['Balance'];


                        if ($item['Payable name']==$payablename){
                            $summarrearswithvacant+=$item['Arrears'];
                        }
                         if ($item['Payable name']==$payablename){
                            $summonthpaywithvacant+=$item['Monthly'];
                            }
                            if ($item['Payable name']==$payablename){
                             $summotalexpectedwithvacant+=$item['Expected'];
                            }
                            if ($item['Payable name']==$payablename){
                              $summamountpaidwithvacant+=$item['AmountPaid'];
                            }
                            if ($item['Payable name']==$payablename){
                            $summbalancewithvacant+=$item['Balance'];
                            }

                         $vacant="Vacant";
                            if(stripos($item['t_name'],$vacant)){
                             }else{
                                 $arrearsgrandtotalwithnovacant+=$item['Arrears'];
                             }
                            if(stripos($item['t_name'],$vacant)){
                             }else{
                              $monthpaygrandtotalwithnovacant+=$item['Monthly'];
                             }
                           if(stripos($item['t_name'],$vacant)){
                             }else{
                            $ttexpecetedgrandtotalwithnovacant+=$item['Expected'];
                             }
                             if(stripos($item['t_name'],$vacant)){
                             }else{
                              $amountpaidgrandtotalwithnovacant+=$item['AmountPaid'];
                             }
                            if(stripos($item['t_name'],$vacant)){
                             }else{
                                $balancegrandtotalwithnovacant+=$item['Balance'];

                             }




                       if ($item['Payable name']==$payablename)  {
                             if(stripos($item['t_name'],$vacant)){
                             }else{
                            $summarrearswithnovacant+=$item['Arrears'];
                             }
                      }
                      if ($item['Payable name']==$payablename) {
                          if(stripos($item['t_name'],$vacant)){
                          }else{
                             $summonthpaywithnovacant+=$item['Monthly'];
                              }
                      }else{
                      }
                      if ($item['Payable name']==$payablename ) {
                            if(stripos($item['t_name'],$vacant)){
                            }else{
                         $summotalexpectedwithnovacant+=$item['Expected'];
                            }
                      }
                      if ($item['Payable name']==$payablename) {
                            if(stripos($item['t_name'],$vacant)){
                            }else{
                                  $summamountpaidwithnovacant+=$item['AmountPaid'];
                            }
                      }
                      if ($item['Payable name']==$payablename) {
                          if(stripos($item['t_name'],$vacant)){
                          }else{
                              $summbalancewithnovacant+=$item['Balance'];
                          }

                      }

                     @endphp
                     @endforeach
                     <tr style="color: black;background-color: #f3f3f3;font-weight:bold">
                        <td></td>
                        <td class="text-info text-center" colspan="1" >Sub totals</td>
                        <td >{{ $summarrearswithvacant }}</td>
                        <td>{{ $summonthpaywithvacant }}</td>
                        <td>{{$summotalexpectedwithvacant }}</td>
                        <td>{{ $summamountpaidwithvacant }}</td>
                        <td>{{ $summbalancewithvacant }}</td>
                    </tr>

                    @endif

                @endforeach
                <tr style="color: white;background-color: rgb(91, 95, 90)">
                    <td></td>
                    <td class="text-info text-center" colspan="1" >Grand totals</td>
                    <td >{{ $arrearsgrandtotalwithvacant }}</td>
                    <td>{{ $monthpaygrandtotalwithvacant }}</td>
                    <td>{{ $ttexpecetedgrandtotalwithvacant }}</td>
                    <td>{{$amountpaidgrandtotalwithvacant  }}</td>
                    <td>{{ $balancegrandtotalwithvacant }}</td>
                </tr>
                <tr style="height: 30px">
                    <td></td>
                    <td class="text-white text-center" colspan="1" ></td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold;background-color:white">
                    <td colspan="3">No of tenants in this statement: {{ $i }}</td>
                    <td></td>

                    @php
                        $monthpayorcollected=0;
                    @endphp
                    <td colspan="2">{{ $monthlycollectedorexpected }}</td>
                    @if ( $monthlycollectedorexpected==="Monthly Expected")
                     @php
                          $monthpayorcollected=$monthpaygrandtotalwithnovacant;
                     @endphp
                    @elseif($monthlycollectedorexpected==="Monthly collected")
                    @php
                    $monthpayorcollected=$amountpaidgrandtotalwithnovacant;
                    @endphp
                    @else
                    @endif
                    <td class="text-center" style="border-bottom: 2px solid black">{{$monthpayorcollected }}</td>
                </tr>
                <tr>
                         <td></td>
                          <td colspan="4"></td>
                          <td></td>
                          <td ></td>
                </tr>

                @php
                $bcfff=0;
                 @endphp
                 @if(!empty($landlorddeductions))
                 @foreach ($landlorddeductions as $item)
                      <tr>
                          <td ></td>
                          <td colspan="4">{{ $item['Payable']}}</td>
                          <td></td>
                      <td class="text-right" >{{ $item['Amount'] }}</td>
                      @php
                      $bcfff+=$item['Amount'];
                      @endphp
                      </tr>
                 @endforeach
                 @endif
                 <tr>
                    @php
                        $expectedremittance=0;
                            $cents='.00';
                        $expectedremittance=$monthpayorcollected+$bcfff;
                            $expectedremittance.=$cents;

                    @endphp
                    <td></td>
                    <td colspan="4">Expected Remittance</td>
                         <td></td>
                    <td  class="text-right " style="border-bottom: 2px solid black">{{$expectedremittance}}</td>
                    </tr>
                    <tr>
                        <td></td>
                         <td colspan="4"></td>
                         <td></td>
                         <td ></td>
               </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td  style="font-weight: bold">Deductions</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @php
                        $deductions=0;
                    @endphp
                      @foreach ($ldeductions as $deductin)
                      <tr id="landlordded">
                         <td ></td>
                          <td colspan="4">{{ $deductin['Payable'] }}</td>
                           <td >{{ $deductin['Expr1001'] }}</td>
                           <td style="text-align:right">{{ $deductin['Amount'] }}</td>
                              @php
                                  $deductions+=$deductin['Amount'];
                              @endphp
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="6"></td>
                    <td style="font-weight: bold;border-top: 2px solid black;border-bottom: 2px solid black;text-align:right" >{{ $deductions.=$cents }}</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td style="font-weight: bold;text-align: right" >Net due</td>
                         @php
                         $netdue=$expectedremittance-$deductions;
                         $netdue.=$cents;
                     @endphp
                    <td style="font-weight: bold;text-align:right">{{$netdue}}</td>                    </tr>
                    <tr>
                        <td colspan="4">Current vacant units {{$cvus}}</td>
                    </tr>
                      <tr>
                        <td colspan="7">NB:______________________________________________</td>
                    </tr>
                    <tr>
                 <td colspan="7"><p>Prepared By: ...............................................................................
                    Approved By: ...............................................................................
                </p></td>
                    </tr>
                    <tr>
                        <td colspan="7">Payment to: {{ $PAYEMNTTO }}</td>
                        <hr>
                    </tr>

                 @endif

                </table>
            </div>
     </body>
</html>
