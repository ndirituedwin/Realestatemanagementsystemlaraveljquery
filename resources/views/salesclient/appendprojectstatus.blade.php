
<div class="row">
    <div class="panel panel-default"   >
        <div class="panel-heading"  style="background-color: rgb(174, 177, 174)"><h4 class="text-center">Project statuses</h4>
            <div class="panel-body" style=" background-color: white;overflow-x: scroll" >
             <div class="col-md-12" >
                 <div class="row" style="max-height: 500px" >
                     <table id="myprojectstatuses"  class="table table-responsive table-hover table-bordered table-condensed">
                         @if (empty($projectstatuses))
                            <h4 class="text-danger text-center" >No data available</h4>
                         @else

                         <thead>
                             <th>name</th><th>Unit_No</th><th>Unit_category</th><th>Description</th><th>Unit_cost</th><th>status</th><th>RegDate</th>
                           </thead>
                        <tbody style="width: 100px">
                            @foreach ($projectstatuses as $projectstatus)
                            <tr id="mytableee">
                                <td>{{$projectstatus->Name}}</td>
                                <td>{{$projectstatus->UnitNo}}</td>
                                <td>{{$projectstatus->UnitCategory}}</td>
                                <td>{{$projectstatus->Description}}</td>
                                <td>{{$projectstatus->UnitCost}}</td>
                                <td>{{$projectstatus->Status}}</td>
                                <td>{{$projectstatus->RegDate}}</td>


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
 </div>






