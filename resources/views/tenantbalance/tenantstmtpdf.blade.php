<!DOCTYPE html>
<html>
     <head>
         <title>tenant_stmt_pdf</title>
         {{-- <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}"> --}}

             <style type="tex/css">
              .container{
             margin-top: -40px;
         }
         .container4{
            margin-top: -40px;


         }
            .container2{
                margin-top: -20px;
                margin-left: 200px;
            }

            .tenantname{
                margin-left:200px;
                margin-top: -100px
            }
            /* .stmttenant th{
                border-bottom: 1px solid rgb(161, 168, 161);
                width: 40%;
                font-family: cursive;
                width: 20%;
            }
            .stmtrow td{
                border-bottom: 1px solid rgb(116, 116, 116);
                text-align: center;
                  font-family: Arial;
                  font-size:15px;
            }
            .stmttenant,th{
                  font-family: Arial;

            } */
                        /* * {
            font-family: sans-serif; /* Change your font family */
            } */
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
            border-bottom: 1px solid black;
            }

            .content-table tbody tr:nth-of-type(even) {
            /* background-color: #a5a1a1; */
            }

            .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
            }
            .content-table tbody tr td {
                border-bottom: 1px solid #dddddd;
                }

            .content-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
            }
            .stmttenant th{
                border-bottom: 1px solid black;

            }

            </style>

        </head>
     <body>
         <br/>
        <div class="container" >
            <p><h3 align="center"><b >{{($companyname)?$companyname:'' }}</b></h3></p>
            <p style="margin-top: -10px"><h4  align="center"><i>{{($slogan)?$slogan:'' }}</i></h4></p>
            <p style="margin-top: -10px><h4"  align="center"><b>{{($address)?$address:'' }}</b></h4></p>
            <p  style="margin-top: -10px><h4" ><h4  align="center"><b>Cell:{{($phonenumber)?$phonenumber:'' }}</b></h4></p>
            <p  style="margin-top: -20px><h4" ><h4  align="center"><b>Email:{{($email)?$email:'' }}</b></h4></p>
            <p style="margin-top: -15px><h4" ><h6 style="margin-top: -16px;background-color: rgb(156, 146, 146);height: 2px;width: 100%;"></h4></p>
            <p  style="margin-top: -16px><h4" ><h4  align="center" style="color: black;margin-top: -1110px" >STATEMENT OF ACCOUNT</h4></p>
        </div>
        <div class="contaminer2">
            <table class="table" >
                <tbody>
                    <tr >
                        <td>Tenant Code: {{ $tcode}}</td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                  <td>Tenant Name: {{ $tenantname }}</td>
                    </tr>
                    <tr>
                        <td>Property: {{ $propertyid }}</td>
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
                <table   class="content-table">

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
                          $Bal+=$st['Debit']-$st['Credit']


                        ?>
                         <tr class="stmtrow">
                            <td >{{ $i}}</td>
                            <td>{{ $st['trandate'] }}</td>
                            <td>{{ $st['Payablename'] }}</td>
                              <td style="font-size:13px">{{ $st['ReceiptNo'] }}</td>
                              <td>{{ $st['PaymentType'] }}</td>
                              <td >{{ $st['DMonth'] }}</td>
                              <td>{{ $st['Debit'] }}</td>
                              <td>{{ $st['Credit'] }}</td>
                              @php
                              if( $st['Credit'] != '.00'){

                                  //$balance=$st['Credit'];
                                  $balance+=$st['Debit']-$st['Credit'];

                                   if($balance==0){
                                       $balance=$balance;

                                   }

                              }elseif ($st['Credit'] > $st['Debit']) {
                                $balance+=($st['Debit']-$st['Credit']);

                              }else{
                                  $balance+=$st['Debit'];
                              }

                              @endphp
                              <td>{{ $Bal }}</td>
                         </tr>
                         @php
                             $totaldebit+=$st['Debit'];
                             $totalcredit+=$st['Credit'];
                         @endphp
                         <?php }?>

                        <tr>
                           <th colspan="6"></th>
                            <th style="border-bottom: 4px solid black">{{ $totaldebit }}</th>
                            <th style="border-bottom: 4px solid black">{{ $totalcredit }}</th>
                        </tr>


                     </tbody>
                </table>
            </div>
     </body>
</html>
