<!DOCTYPE html>
<html>
     <head>
         <title>tenant_stmt_pdf</title>
         <style type="text/css">
          .container{
             margin-top: -40px;
         }
         .container4{
             margin-top:-40px;
         }


                        .content-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                width:100%;
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
               .stmttenant, th{
                    border-bottom: 1px solid blck;
                }

               /*  .content-table th,
                .content-table td {
                padding: 12px 15px;
                }*/

                .content-table tbody tr {
                border-bottom: 1px solid #dddddd;
                }
               .content-table tbody tr td {
                border-bottom: 1px solid #dddddd;
                    text-align: center;

                }

                .content-table tbody tr:nth-of-type(even) {
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
            <p style="margin-top: -10px"  align="center"><i>{{($slogan)?$slogan:'' }}</i></p>
            <p style="margin-top: -10px"  align="center">{{($address)?$address:'' }}</p>
            <p  style="margin-top: -10px"  align="center">Cell:{{($phonenumber)?$phonenumber:'' }}</p>
            <p  style="margin-top: -20px"  align="center">Email:{{($email)?$email:'' }}</p>
            <p style="margin-top: -15px"><h6 style="margin-top: -16px;background-color: rgb(156, 146, 146);height: 2px;width: 100%;"></p>
            <p  style="margin-top: -16px"><h4  align="center" style="color: black;margin-top: -1110px" >STATEMENT OF ACCOUNT</h4></p>
        </div>
        <div class="container2">
            <table class="table" >
                <tbody>
                    <tr>
                        <td >Tenant Code: {{ $tcode}}</td>
                        {{-- <td colspan="5"></td> --}}
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td>Tenant Name: {{ $tenantname }}</td>
                    </tr>
                    <tr>
                        <td>Property: {{ $propertyid }}</td>
                        {{-- <td colspan="5"></td> --}}
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>

                        <td>Unit: {{ $unitid }}</td>
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
                        <td>From: {{ $lastyear }}</td>
                        <td></td><td></td><td></td><td></td><td></td>
                        <td>To: {{ $cdate }}</td>
                    </tr>
                </tbody>

            </table>
            <h6 style="margin-top:1px;background-color: rgb(56, 54, 54);height: 2px;"></h6>
        </div>
        {{-- <h6 style="margin-top:10px;margin-left: -10px;background-color: rgb(56, 54, 54);height: 2px;"></h6> --}}

            <div class="container4">
                <table  class="content-table">

                    <tr class="stmttenant">
                        <th>#</th><th>Date</th><th>Payables</th><th>Receipt No</th><th>Mode</th><th>Month</th><th>Debit</th><th>Credit</th><th>Balance</th>

                    </tr>
                     <tbody>
                        <?php
                        $balance=0;
                        $totaldebit=0;
                        $totalcredit=0;
                        $Bal=0;

                        $i=0;
                         foreach ($tenants as $st) {
                          $i++;
                          $Bal+=$st->Debit-$st->Credit


                        ?>
                         {{-- <tr class="stmtrow" style="text-align: center;font-size:15px"> --}}
                         <tr class="" >
                            <td>{{ $i}}</td>
                            <td>{{ $st->trandate }}</td>
                            <td>{{ $st->Payablename }}</td>
                              <td style="font-size: 10px">{{ $st->ReceiptNo }}</td>
                              <td>{{ $st->PaymentType }}</td>
                              <td >{{ $st->DMonth }}</td>
                              <td>{{ $st->Debit }}</td>
                              <td>{{ $st->Credit }}</td>
                              @php
                              if( $st->Credit != '.00'){

                                  //$balance=$st->Credit;
                                  $balance+=$st->Debit-$st->Credit;

                                   if($balance==0){
                                       $balance=$balance;

                                   }

                              }elseif ($st->Credit > $st->Debit) {
                                $balance+=($st->Debit-$st->Credit);

                              }else{
                                  $balance+=$st->Debit;
                              }

                              @endphp
                              <td>{{ $Bal }}</td>
                         </tr>
                         @php
                             $totaldebit+=$st->Debit;
                             $totalcredit+=$st->Credit;
                         @endphp
                         <?php }?>

                        <tr >
                           <th colspan="6"></th>
                            <th style="border-bottom: 4px solid black">{{ $totaldebit }}</th>
                            <th style="border-bottom: 4px solid black">{{ $totalcredit }}</th>
                        </tr>




                     </tbody>
                </table>
            </div>
     </body>
</html>
