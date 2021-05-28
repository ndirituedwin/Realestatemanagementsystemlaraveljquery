
<?php
use App\Models\Tenantbalance;
?>
<div class="row">
    
    <div class="panel panel-default">
        <center>
            <input type="text" id="searchtenant" name="searchh" placeholder="Search by phone or field officer" style="width: 40%;margin-top: 7px;margin-bottom: 7px" class="form-control">
           </center>

        <div class="panel-heading" style="background-color: rgb(174, 177, 174)"><h4 class="text-center">Tenant balances</h4>

            <div class="panel-body" style="background-color: white;overflow-x: scroll">
             <div class="col-md-12">
                 <div class="row">
                     <table class="table table-responsive table-hover table-bordered table-condensed">
                         @if (empty($tenantbalances))
                            <h4 class="text-danger text-center" >No data available</h4>
                         @else
                         <thead>
                            <!--<th>View details</th><th>Name</th><th>Property</th><th>telno</th><th>fieldofficer</th><th>balance</th>-->
                            <th>View details</th><th>Tenanat name</th><th>Property</th><th>Unit</th><th>telno</th><th>fieldofficer</th><th>balance</th>
                           </thead>
                           <tbody id="tenantttttt">
                               <?php $total=0;?>
                            @foreach ($tenantbalances as $tenantbalance)
                            <?php
                            Session::put('tenat',$tenantbalance);
                          $parameter =[
                            't_code' =>$tenantbalance->t_code,
                            'TenantNames' =>$tenantbalance->TenantNames ,
                            'Tel' =>$tenantbalance->Tel,
                            'PropertyID' =>$tenantbalance->PropertyID,
                            'unit_id' =>$tenantbalance->unit_id,
                            'Month_Name' =>$tenantbalance->Month_Name,
                            'Year' =>$tenantbalance->Year
                            ];
                            $parameter1= Crypt::encrypt($parameter['t_code']);
                            $parameter2= Crypt::encrypt($parameter['TenantNames']);
                            $parameter3= Crypt::encrypt($parameter['Tel']);
                            $parameter4= Crypt::encrypt($parameter['PropertyID']);
                            $parameter5= Crypt::encrypt($parameter['unit_id']);
                            $parameter6= Crypt::encrypt($parameter['Month_Name']);
                            $parameter7= Crypt::encrypt($parameter['Year']);
                            
                          ?>
                            <tr>
                                <td><a href="{{ route('tenant.single',$parameter1 ) }}&&&{{ $parameter2 }}&&&{{$parameter3}})&&&{{$parameter4}})&&&{{$parameter5}}&&&{{$parameter6}}&&&({{$parameter7}}" class="btn btn-success">View details</a></td>
                                <td>{{$tenantbalance->TenantNames}}</td>
                                <td>{{$tenantbalance->PropertyID}}</td>
                                <td>{{$tenantbalance->unit_id}}</td>
                                <td>{{$tenantbalance->Tel}}</td>
                             <td>{{$tenantbalance->OfficerInCharge}}</td>
                             <td>{{$tenantbalance->Balance}}</td>
                            
                         </tr>  
                         @php
                                $total+=$tenantbalance->Balance
                             @endphp  
                            @endforeach
                            <thead>
                                <th></th><th></th><th></th><th></th><th></th><th>Total Sum</th><th>{{$total}}</th>
                             </thead>
                          
                            
                     </tbody>
                             @endif
                             
                             <?php       
                             ?>
                   </table>
                 </div>
             </div>
            </div>
        </div>
    </div>
     
 </div>
 
 
   
 
 
 
 
 