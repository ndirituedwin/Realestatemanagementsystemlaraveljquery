<?
use App\Models\Product;
?>
<hr class="text-danger">
<div class="panel panel-default" style="display: none">
    <div class="panel-heading"> <h4 class="text-center text-danger">Tenant balances</h4>
        <div class="panel-body">
         <div class="col-md-12" style="background-color: rgb(178, 201, 172)">
             <div class="row">
                
                 <table class="table table-responsive table-hover table-bordered table-condensed">
                     @if (empty($tenantbalances))
                        <h4 class="text-danger">No data available</h4>
                     @else
                 
                     <thead>
                         <th>id</th><th>Propert id</th><th>tcode</th><th>telno</th><th>Location</th><th>fieldofficer</th><th>balance</th>
                       </thead>
                      <tbody id="appendtenantbalances">
                          <?php $sum=0;?>
                     @foreach ($tenantbalances as $tenantbalance)
                             
                         <tr>
                             <td>{{$tenantbalance->id}}</td>
                             <td>{{$tenantbalance->property_id}}</td>
                             <td>{{$tenantbalance->tcode}}</td>
                             <td>{{$tenantbalance->telno}}</td>
                             <td>{{$tenantbalance->location}}</td>
                             <td>{{$tenantbalance->fieldofficer}}</td>
                             <td>{{$summation}}</td> 
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