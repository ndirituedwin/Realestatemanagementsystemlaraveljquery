
<style type="text/css">
 #landlordded td{
      font-size: 13px

 }

</style>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

    <div class="col-md-4"></div>
</div>
        <div class="col-md-12">

            <div class="panel panel-default" style="background-color: rgb(174, 177, 174);margin-top: 1%">

                <div class="panel-body" style="max-height: 800px;background-color: white;overflow: auto">
                    <p><h3  class="text-center"><b >{{($companyname)?$companyname:'' }}</b></h3></p>
                    <p><h5  class="text-center"><i>{{($slogan)?$slogan:'' }}</i></h5></p>
                    <p><h5  class="text-center">{{($address)?$address:'' }}></h5></p>
                    <p><h5  class="text-center">Cell:{{($phonenumber)?$phonenumber:'' }}></h5></p>
                    <p><h5  class="text-center">Email:{{($email)?$email:'' }}></h5></p>
                    <p><h6 style="margin-top: -6px;background-color: rgb(156, 146, 146);height: 2px;width: 100%;"></h4></p>
                        <p><h3 class="text-center"><b> PROPERTY ACCOUNT STATEMENT</b></h3></p>
                        {{-- <p><h6  class="text-center"> OWNER: {{ $landlordcode }} - {{ ($name['othername'])?$name['othername']:'' }} {{ ($name['surname'])?$name['surname']:'' }}</h6></p> --}}
                        <div class="row" style="margin-top: -5px;margin-left: 20px">
                            <div class="col-md-10">
                                <p style="text-decoration-style: dotted;height: 1px;background-color: black"></p>

                            </div>
                            <div class="col-md-2"></div>
            </div>

            <div class="row" >

                <div class="container">

                   <?php
                   $arrears=0;
                   $landlordstmtsdisplay=[];
                    $sum_array = [];
                    $final_array = [];
                if(!empty($landlordstmts)){
                    foreach ($landlordstmts as $stmt) {
                        $landlordstmtsdisplay[$stmt['payable'].';;;'.$stmt['Payable name']][]=$stmt;
                        // if (key_exists($stmt['payable'], $sum_array)) {
                        //             $sum_array[$stmt['payable']] += $stmt['Arrears'];
                        //         } else {
                        //             $sum_array[$stmt['payable']] = $stmt['Arrears'];
                        //         }

                   }
                }
                // ksort($sum_array,SORT_NUMERIC);
                // foreach($sum_array as $key => $value) {
                //  $final_array[] = ['payable' => $key, 'Arrears' => $value];
                //  }
                //  foreach ($final_array as $key => $arrear) { */?>
                  <tr>


                  </tr>
                 <?php// }

               ?>
                    <table  class="table  table-bordered table-responsive table-hover table-condensed" style="max-width: 100%;overflow-x: auto" >
                        <div class="row">
                        <div class="container">
                             <div class="col-md-4"><h5 style="margin-left: -10px">Property L.r no: {{$landlordnumber}}</h5></div>
                             <div class="col-md-"><h5 style="margin-left: -10px">OWNER: {{ $landlordcode }} - {{ ($name['othername'])?$name['othername']:'' }} {{ ($name['surname'])?$name['surname']:'' }}</b></h5></div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col-md-4"><h5 style="margin-left: -10px">Payment period: {{$month2}} {{ $year2 }}</h5></div>
                        <div class="col-md-8"></div>
                        <div class="col-md-12">
                            <h6 style="margin-top: -6px;margin-left: -10px;background-color: rgb(56, 54, 54);height: 2px;width: 90%;"></h4>
                            </div>
                            <div class="col-md-12">
                                <h6 style="margin-top: -5px;margin-left: -10px;background-color: black;height: 3px;;width: 90%;"></h4>
                        </div>
                    </div>
                </div>
                <thead>
                    <th>Unit</th><th>Tenant</th><th>Arrears</th><th>Month Pay</th><th>Total expected</th><th>Amount paid</th><th>Balance</th>

                </thead>
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

                    <tr>
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
                     <tr>
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
                              $monthlycollectedorexpected="Monthly Collected";
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
                        <td class=" text-center" colspan="1" >Sub totals</td>
                        <td >{{ $summarrearswithvacant }}</td>
                        <td>{{ $summonthpaywithvacant }}</td>
                        <td>{{$summotalexpectedwithvacant }}</td>
                        <td>{{ $summamountpaidwithvacant }}</td>
                        <td>{{ $summbalancewithvacant }}</td>
                    </tr>

                    @endif

                @endforeach
                <tr></tr>
                <tr style="color: white;background-color: rgb(91, 95, 90)">
                    <td></td>
                    <td class="text-white text-center" colspan="1" >Grand totals</td>
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
                    <td></td>
                    <td colspan="3" class="text-bold text-center">No of tenants in this statement: {{ $i }}</td>
                    <td></td>

                    @php
                        $monthpayorcollected=0;
                    @endphp
                    <td class="text-center">{{ $monthlycollectedorexpected }}</td>
                    @if ( $monthlycollectedorexpected==="Monthly Expected")
                     @php
                          $monthpayorcollected=$monthpaygrandtotalwithnovacant;
                     @endphp
                    @elseif($monthlycollectedorexpected==="Monthly Collected")
                    @php
                        $cent='.00';
                    $monthpayorcollected=$amountpaidgrandtotalwithnovacant;
                    $monthpayorcollected.=$cent;
                    @endphp
                    @else
                    @endif
                    <td class="text-right">{{$monthpayorcollected }}</td>
                </tr>
                @php
               $bcfff=0;
                @endphp
                     @foreach ($landlorddeductions as $deduction)
                                       <tr>

                     @if ($deduction['Type']=="E")
                            <td colspan="5"></td>
                          <td >{{ $deduction['Payable'] }}</td>
                        <td  class="text-right " >{{ $deduction['Amount'] }}</td>
                        @php
                      $bcfff+=$deduction['Amount'];
                        @endphp
                     @endif
                </tr>
                      @endforeach
                <tr>
                @php
                    $expectedremittance=0;
                    $cents='.00';
                    $expectedremittance=$monthpayorcollected+$bcfff;
                    $expectedremittance.=$cents;
                @endphp
                    <td colspan="5"></td>
                    <td >Expected Remittance</td>
                    <td  class="text-right " style="border-bottom: 2px solid black">{{$expectedremittance}}</td>
                    <td ></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td  style="font-weight: bold">Deductions</td>
                </tr>
                @php
                     $deductions=0;
                @endphp

                @foreach ($landlorddeductions as $deductin)
                <tr id="landlordded">
                   <td colspan="4"></td>
                     @if ($deductin['Type']=="E")
                     @else
                    <td >{{ $deductin['Payable'] }}</td>
                     <td >{{ $deductin['Expr1001'] }}</td>
                     <td style="text-align:right">{{ $deductin['Amount'] }}</td>
                        @php
                            $deductions+=$deductin['Amount'];
                        @endphp
                         @endif

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
                    <td style="font-weight: bold;text-align:right">{{$netdue}}</td>
                </tr>
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
      </div>
    </div>
</div>
</div>


