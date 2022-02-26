<style type="text/css">
    .subtotals > td{
         font-weight: 700;
         text-align: right;
    }
    .maintotal {
       color: blue;
       font-weight: 700;
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
<div class="row">
    <div class="panel panel-default"   >
        <div class="panel-heading"  style="background-color: rgb(174, 177, 174)">


            <div class="panel-body" style=" background-color: white;overflow-x: scroll" >
                <div class="row">
                    {{-- <div class="col-md-2"></div> --}}
                    <div class="col-md-4">
                        <p><h3><b >{{($companydetails[0]->CompanyName)?$companydetails[0]->CompanyName:'' }}</b></h3></p>
                        <p><h5><i>{{($companydetails[0]->Slogan)?$companydetails[0]->Slogan:'' }}</i></h5></p>
                        <p><h5>{{($companydetails[0]->Address1)?$companydetails[0]->Address1:'' }}</h5></p>
                        <p><h5>Cell:{{($companydetails[0]->PhoneNumber)?$companydetails[0]->PhoneNumber:'' }}</h5></p>
                        <p><h5>Email:{{($companydetails[0]->Email)?$companydetails[0]->Email:'' }}</h5></p>
                           </div>
                           <div class="col-md-3">
                        </div>
                                    <div class="col-md-3">
                            {{-- <p style="margin-top: 40px">{{ date('d-M-Y H:i:s AM') }}</p> --}}
                            <p style="margin-top: 40px"><?= Date('D,d M Y ')?> <i id="ccclock"></i></p>

                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p  ><center class="clientstmt">CLIENT STATEMENT</center></p>
                        {{-- <h6 style="margin-top: -5px;margin-left: -10px;background-color: black;height: 3px;;width: 90%;"></h4> --}}
                            <h6 style="background-color: black;height: 2px;"></h4>
                                <h6 style="margin-top: -5px;background-color: rgb(22, 22, 22);height: 3px;"></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <tr>
                            <td>Client No:</td>
                            <td></td>
                            <td ><i class="dotted">{{ (Session::get('username'))?Session::get('username'):'' }}</i></td>
                        </tr>
                    </div>
                    <div class="col-md-4">
                        <tr>
                            <td>Name:</td>
                            <td></td>

                            <td ><i class="dotted">{{ (Session::get('salesagentname'))?Session::get('salesagentname'):'' }}</i></td>
                        </tr>
                    </div>
                    <div class="col-md-4">
                        <tr>
                            <td>ID:</td>
                            <td></td>
                            <td ><i class="dotted">{{ (Session::get('salesagentidno'))?Session::get('salesagentidno'):'' }}</i></td>
                        </tr>
                    </div>
                </div>
             <div class="row">
                 <div class="col-md-12">
                    <h6 style="background-color: rgb(22, 22, 22);height: 3px;"></h4>

                 </div>
             </div>
             <div class="col-md-12" >
                 <div class="row" style="max-height: 1200px" >
                     <table id="myclientstatements"  class="table table-responsive table-hover table-bordered table-condensed">

                        @if (empty($clientstatements))
                            <h4 class="text-danger text-center" >No data available</h4>
                         @else
                         <thead>
                             <th>TrandDate</th><th>VoucherNo</th><th>Description</th><th>Project</th><th>UnitNo</th><th>Debit</th><th>Credit</th><th>Balance</th>
                           </thead>
                        <tbody style="width: 100px">
                            <?php
                                 $debitmaintotal=0;
                                 $creditmaintotal=0;

                                // $debitmaintotal=0;
                                // $creditmaintotal=0;
                                // $balancemaintotal=0;
                                $cents='.00';

                                ?>
                            @foreach ($clientstatements as $key=> $clientstatement)
                            <?php
                                $debit=0;
                                $credit=0;
                                $balance=0;


                                // $debit=0;
                            // $credit=0;
                            // $balance=0;
                            //  $runningbalance=0;



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
                                <td>
                                    {{$statement['Dr']}}
                                    <?php
                                    $debit+=$statement['Dr'];
                                    $debitmaintotal+=$statement['Dr']

                                    ?>
                                </td>
                                <td>
                                    {{$statement['Cr']}}
                                    <?php
                                    $credit+=$statement['Cr'];
                                    $creditmaintotal+=$statement['Cr']

                                    ?>


                                </td>
                                <td>{{$statement['Balance']}}</td>
                                {{-- <td>{{$runningbalance=$statement['Balance']}}</td> --}}
                           {{-- @php
                              $debit+=$statement['Dr'];
                              $credit+=$statement['Cr'];
                              $debitmaintotal+=$statement['Dr'];
                              $creditmaintotal=$statement['Cr'];

                             @endphp --}}
                              </tr>


                               @endforeach


                            {{-- </tr> --}}

                               @endforeach
                                {{-- @php
                                    $balance=($debit-$credit);

                                @endphp --}}
                               {{-- <tr class="subtotals">
                                <td colspan="5"></td>
                                <td>{{ $debit.$cents }}</td>
                                <td> {{ $credit.$cents }}</td>
                                <td>{{$balance.$cents}}</td>
                                <td>{{$runningbalance.$cents}}</td>

                            </tr> --}}
                            <tr class="subtotals">
                                <td colspan="5">
                                    <td>{{ $debit.$cents }}</td>
                                    <td>{{ $credit.$cents }}</td>

                                    <td>
                                        <?php
                                            $balancee=$debit-$credit;
                                            ?>
                                        {{ $balancee.$cents }}</td>

                                </td>
                            </tr>

                            {{-- </tr> --}}

                         @endforeach
                         {{-- @php
                          $balancemaintotal=($debitmaintotal-$creditmaintotal);

                         @endphp --}}
                         {{-- <tr>
                             <td colspan="5"></td>
                             <td class="maintotal"><h5 class="hfou">{{ $debitmaintotal.$cents }}</h5></td>
                             <td class="maintotal"><h5 class="hfou">{{ $creditmaintotal.$cents }}</h5></td>
                             <td class="maintotal"><h5 class="hfou">{{ $balancemaintotal.$cents }}</h5></td>
                         </tr> --}}
                         <tr>
                             <tr>
                                 <td colspan="5"></td>
                                 <td class="maintotal"><h5 class="hfou">{{ $debitmaintotal.$cents }}</h5></td>
                                 <td class="maintotal"><h5 class="hfou">{{ $creditmaintotal.$cents }}</h5></td>
                             </tr>
                            <td colspan="4"></td>
                            <td ></td>
                        </tr>


                        </tbody>
                        @endif

                   </table>

                 </div>

             </div>


            </div>
            <div class="panel-footer">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                       <p> Note: Any omission or errors in this statement should be promptly advised in writing to the Management Office within 30 days from the date of receipt otherwise the account
                        will be presumed to be in order.
                        This is a computer-generated document. No signature is required</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>






