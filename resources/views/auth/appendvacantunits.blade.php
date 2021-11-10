

<div class="row">

    <div class="panel panel-default"   >
        <div class="panel-heading"  style="background-color: rgb(174, 177, 174)"><h4 class="text-center">Vacant units</h4>
            <div class="panel-body" style=" background-color: white;overflow-x: scroll" >
             <div class="col-md-12" >
                 <div class="row" style="max-height: 500px" >
                     <table id="mydatatable"  class="table table-responsive table-hover table-bordered table-condensed">
                         @if (empty($vacantunits))
                            <h4 class="text-danger text-center" >No data available</h4>
                         @else

                         <thead>
                             <th>property_id</th><th>Unitid</th><th>Category</th><th>Location</th><th>Rent</th><th>status</th>
                           </thead>
                        <tbody style="width: 100px">
                            @foreach ($vacantunits as $vacant)
                            <tr id="mytableee">
                                <td>{{$vacant->property_id}}</td>
                                <td>{{$vacant->unit_id}}</td>
                                <td>{{$vacant->Category}}</td>
                                <td>{{$vacant->Location}}</td>
                                <td>{{$vacant->Rent}}</td>
                                <td>{{$vacant->status}}</td>
                             <?php /*<td>{{$vacant->rent_amount}}</td>*/?>


                         </tr>
                         @endforeach

                        </tbody>
                        @endif

                   </table>
                   {{-- <?php echo /*$vacantunits->render();*/ ?> --}}
                  {{-- <p id="pagination"> --}}
                    {{-- {!! $vacantunits->links() !!} --}}
                  {{-- </p> --}}
                 </div>

             </div>
            </div>
        </div>
    </div>
 </div>






