<div class="panel panel-default">
    {{-- <center>
        <input type="text" id="searchtenant" name="searchhh" placeholder="Search by phone or field officer" style="width: 40%;margin-top: 7px;margin-bottom: 7px" class="form-control">
       </center> --}}

    <div class="panel-heading" style="background-color: rgb(174, 177, 174)"><h4 class="text-center">Property Monthly transactions</h4>
        <div class="panel-body" style="background-color: white;overflow-x: scroll">
         <div class="col-md-12">
             <div class="row" style="max-height: 500px">
                 <table id="landlordpropertystat" class="table table-responsive table-hover table-bordered table-condensed" >
                     @if (empty($statements))
                        <h4 class="text-danger text-center" >No data available</h4>
                      @else
                     <thead>
                        <th>Unit</th><th>Tenant</th><th>Payable</th><th>Amount</th><th>ReceiptNo</th><th>RegNo</th><th>Payment Date</th><th>Payment Type</th>
                       </thead>
                       <tbody id="appendstatementhere">
                        @foreach ($statements as $statement)
                        <tr>
                            <td>{{$statement['Unit']}}</td>
                            <td>{{$statement['Tenant']}}</td>
                            <td>{{$statement['Payable']}}</td>
                            <td>{{$statement['AmountPaid']}}</td>
                         <td>{{$statement['ReceiptNo']}}</td>
                         <td>{{$statement['RefNo']}}</td>
                         {{-- <td></td> --}}
                         <td>{{$statement['Payment Date']}}</td>
                         <td>{{$statement['paymenttype']}}</td>
                     </tr>
                        @endforeach
                 </tbody>
                         @endif
               </table>
          
             </div>
         </div>
        </div>
    </div>
</div>
