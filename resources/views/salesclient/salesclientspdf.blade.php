<!DOCTYPE html>
<html>
     <head>
         <title>Sales agent</title>
         {{-- <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}"> --}}
         <style type="text/css">



         .container{
             margin-top: -40px;
             margin-left: 30px;
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
                #hg th{
             border-bottom: 1px solid black;
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

                .content-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
                }

                .content-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
                }

                            .subtotals > td{
                    font-weight: 700;
                    text-align: right;
                }
                .maintotal {
                color: blue;
                font-weight: 1200;
                }
                .hfou{
                    border-bottom: 2px solid black;
                    text-align: right

                }

                .clientstmt{
                    color:red;
                    font-weight: 800;
                }
                .dotted {
                    border-bottom-style: dotted;

                }

         </style>
        </head>
     <body>
         <br/>
         <div class="container">
             <p style="margin-top: 0px;margin-left: 500px"><?= Date('D,d M Y ')?> <i id="ccclock"></i></p>
          <p><h3 align="left"><b >{{($companydetails[0]->CompanyName)?$companydetails[0]->CompanyName:'' }}</b></h3></p>
            <p style="margin-top: -20px;" align="left"><i>{{($companydetails[0]->Slogan)?$companydetails[0]->Slogan:'' }}</i></p>
            <p style="margin-top: -14px;" align="left">{{($companydetails[0]->Address1)?$companydetails[0]->Address1:'' }}</p>
            <p  style="margin-top: -14px" align="left">Cell:{{($companydetails[0]->PhoneNumber)?$companydetails[0]->PhoneNumber:'' }}</p>
            <p  style="margin-top: -14px" align="left">Email:{{($companydetails[0]->Email)?$companydetails[0]->Email:'' }}</p>
                              </div>

                    <p  ><center class="clientstmt">CLIENT STATEMENT</center></p>
                    <h6 style=" margin-top: 10px; background-color:black;height: 1px;"></h4>

        <div class="container2">
            <table class="table" >
                <tbody>
                    <tr>
                        <td>Client No:</td>
                        <td></td>
                        <td ><i class="dotted">{{ (Session::get('username'))?Session::get('username'):'' }}</i></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>

                        <td>Name:</td>
                            <td></td>

                            <td ><i class="dotted">{{ (Session::get('salesclientname'))?Session::get('salesclientname'):'' }}</i></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>    <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td colspan="3"></td>
                            <td>ID:</td>
                            <td></td>
                            <td ><i class="dotted">{{ (Session::get('salesclientidno'))?Session::get('salesclientidno'):'' }}</i></td>

                        </tr>

                </tbody>
            </table>

        </div>
        <div class="container3">
            <h6 style="margin-top:1px;background-color: rgb(56, 54, 54);height: 2px;"></h6>
        </div>

            <div class="container4">

                <table class="content-table">

                    <tr id="hg">
                        <th>TrandDate</th><th>VoucherNo</th><th>Description</th><th>Project</th><th>UnitNo</th><th>Debit</th><th>Credit</th><th>Balance</th>
                    </tr>

                    @if (empty($clientstatements))
                    <h4 class="text-danger text-center" >No data available</h4>
                 @else
                <tbody style="width: 100px">
                    <?php
                        $debitmaintotal=0;
                        $creditmaintotal=0;
                        $balancemaintotal=0;
                        $cents='.00';

                        ?>
                    @foreach ($clientstatements as $key=> $clientstatement)
                    <?php
                    $debit=0;
                    $credit=0;
                    $balance=0;


                    ?>
                    <tr>
                        <td colspan="8">Project:{{ $key }}</td>
                    </tr>
                       @foreach ($clientstatement as $key=>$statemen)
                       <tr>
                        <td colspan="8">Unit:{{ $key }}</td>
                       </tr>
                       @foreach ($statemen as $key=>$statement)
                       <tr id="mytableee">
                        <td>{{$statement['Trandate']}}</td>
                        <td>{{$statement['VoucherNo']}}</td>
                        <td>{{$statement['Description']}}</td>
                        <td>{{$statement['Name']}}</td>
                        <td>{{$statement['UnitNo']}}</td>
                        <td>{{$statement['Dr']}}</td>
                        <td>{{$statement['Cr']}}</td>
                        <td>{{$statement['Balance']}}</td>
                   @php
                      $debit+=$statement['Dr'];
                      $credit+=$statement['Cr'];
                      $debitmaintotal+=$statement['Dr'];
                      $creditmaintotal=$statement['Cr'];

                     @endphp
                      </tr>


                       @endforeach


                    {{-- </tr> --}}

                       @endforeach
                        @php
                            $balance=($debit-$credit);

                        @endphp
                       <tr class="subtotals">
                        <td colspan="5"></td>
                        <td>{{ $debit.$cents }}</td>
                        <td> {{ $credit.$cents }}</td>
                        <td>{{$balance.$cents}}</td>

                    </tr>

                    {{-- </tr> --}}

                 @endforeach
                 @php
                  $balancemaintotal=($debitmaintotal-$creditmaintotal);

                 @endphp
                 <tr>
                     <td colspan="5"></td>
                     <td class="maintotal"><h5 class="hfou">{{ $debitmaintotal.$cents }}</h5></td>
                     <td class="maintotal"><h5 class="hfou">{{ $creditmaintotal.$cents }}</h5></td>
                     <td class="maintotal"><h5 class="hfou">{{ $balancemaintotal.$cents }}</h5></td>
                 </tr>
                 <tr>
                    <td colspan="4"></td>
                    <td ></td>
                </tr>


                </tbody>
                @endif

                </table>
                <p> Note: Any omission or errors in this statement should be promptly advised in writing to the Management Office within 30 days from the date of receipt otherwise the account
                    will be presumed to be in order.
                    This is a computer-generated document. No signature is required</p>
            </div>
     </body>
</html>
