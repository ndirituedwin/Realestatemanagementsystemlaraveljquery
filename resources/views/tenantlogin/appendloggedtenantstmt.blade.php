<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        {{-- <form action="{{ route('loggedtenant.generatepdf')}}" method="POST">
            @csrf
           <button class="btn btn-success" style="">Generate PDF</button></div>
           </form> --}}
    <div class="col-md-4"></div>
</div>
    <div class="col-md-12" >

        <div class="panel panel-default" style="background-color: rgb(174, 177, 174);margin-top: 1%">

            <div class="panel-body" style="max-height: 800px;background-color: white;overflow: auto">
                <p><h3  class="text-center"><b >{{($companyname)?$companyname:'' }}</b></h3></p>
                <p><h4  class="text-center"><i>{{($slogan)?$slogan:'' }}</i></h4></p>
                <p><h4  class="text-center">{{($address)?$address:'' }}</h4></p>
                <p><h4  class="text-center">Cell:{{($phonenumber)?$phonenumber:'' }}</h4></p>
                <p><h4  class="text-center">Email:{{($email)?$email:'' }}</h4></p>
                <p><h6 style="margin-top: -6px;background-color: rgb(156, 146, 146);height: 2px;width: 100%;"></h4></p>
                <p><h4  class="text-center"><b>STATEMENT OF ACCOUNT</b></h4></p>
        <div class="row">
            <div class="container">
                {{-- <div class="col-md-2"></div> --}}
                <div class="col-md-4"><p >Tenant Code: {{($tcode)?$tcode:''}}</p></div>
                {{-- <div class="col-md-2"></div> --}}
                <div class="col-md-4"><p>Tenant Name: {{($tenantname)?$tenantname:''}}</p></div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                {{-- <div class="col-md-2"></div> --}}
                <div class="col-md-4"><p>Property: {{($propertyid)?$propertyid:''}}</p></div>
                {{-- <div class="col-md-2"></div> --}}
                <div class="col-md-4"><p>Unit: {{($unitid)?$unitid:''}}</p></div>
            </div>
        </div>
        <div class="row" >
    <div class="container">
        <table class="table  table-responsive table-hover table-condensed" style="max-width: 100%;overflow-x: auto" >
            @if (empty($tenants))

            <h5 class="text-danger text-center">There are no records on the table</h5>
            @else
            <div class="row">
                <div class="container">
                    <div class="col-md-2"><h5 style="margin-left: -10px">From: <b>{{$lastyear}}</b></h5></div>
            <div class="col-md-2"><h5 style="margin-left: -30px">To: <b>{{$cdate}}</b></h5></div>
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
        <th>#</th><th>Date</th><th>Payables</th><th>Receipt Number</th><th>Payment type</th><th>Month</th><th>Debit</th><th>Credit</th><th>Balance</th>
    </thead>
    <tbody id="vacant">
        <?php
        $balance=0;
        // $Bal=$realbal;
        $Bal=0;
        $i=0;
        $totaldebit=0;
        $totalcredit=0;
         foreach ($tenants as $st) {
          $i++;
          $Bal+=$st->Debit-$st->Credit


        ?>

        {{-- <tr> --}}
            <tr>
                <td>{{ $i}}</td>
                <td>{{ $st->trandate }}</td>
                <td>{{ $st->Payablename }}</td>
                  <td>{{ $st->ReceiptNo }}</td>
                  <td>{{ $st->PaymentType }}</td>
                  <td>{{ $st->DMonth }}</td>
                  <td>{{ $st->Debit }}</td>
                  <td>{{ $st->Credit }}</td>

                     @php
                //   if( $st->Credit != '.00'){

                //       //$balance=$st->Credit;
                //       $balance+=$st->Debit-$st->Credit;

                //        if($balance==0){
                //            $balance=$balance;

                //        }

                //   }elseif ($st->Credit > $st->Debit) {
                //     $balance+=($st->Debit-$st->Credit);

                //   }else{
                //       $balance+=$st->Debit;
                //   }

                  @endphp
                  {{-- <td>{{ $balance }}</td> --}}
                  <td>{{$Bal}}</td>
                </tr>
              @php
                   $totaldebit+=$st->Debit;
                  $totalcredit+=$st->Credit;
              @endphp
            {{-- </tr> --}}
        <?php } ?>


        <thead>
            <th colspan="6"></th><th>{{ $totaldebit }}</th><th>{{ $totalcredit }}</th>
        </thead>
        <thead>
            <th colspan="6"></th><th><h4 style="background-color: black;height: 2px;margin-top: -13px"></h4></th><th><h4 style="background-color: rgb(143, 137, 137);height: 2px;margin-top: -13px"></h4></th>
        </thead>
        <thead>
            <th colspan="6"></th><th><h4 style="background-color: black;height: 2px;margin-top: -20px"></h4></th><th><h4 style="background-color: rgb(143, 137, 137);height: 2px;margin-top: -20px"></h4></th>
        </thead>
    </tbody>


    @endif
</table><hr>
</div>

  </div>
</div>
</div>
</div>
