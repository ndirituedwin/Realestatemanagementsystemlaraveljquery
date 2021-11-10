<?php
 use App\Models\Tenantbalance;
?>
@extends('partials.defaultl')
@section('content')

<a href="{{ route('tenant.balances') }}" id="gobackbtn" class="btn btn-warning" style="margin-top: 60px">Go back</a>
{{-- <a href="/tenantbalances" onclick="history.go(-1); return false;"  class="btn btn-warning" style="margin-top: 100px"> Link </a> --}}
 {{-- <button onclick="goBack()"  class="btn btn-warning" style="margin-top: 60px">Go back</button> --}}

<div class="row" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="tenantname" class="control-label" style="color: white">Tenant name: <i style="color: rgb(209, 207, 55)">{{$tenantname}}</i></label>
           </div>
       </div>
       <div class="col-md-3">
        <div class="form-group">
            <label for="phone" class="control-label" style="color: white">Phone: <i style="color: rgb(209, 207, 55)">{{$tenanttel}}</i></label>
       </div>
   </div>
   <div class="col-md-3">
    <div class="form-group">
        <label for="property" class="control-label" style="color: white">Property: <i style="color: rgb(209, 207, 55)">{{$tenantproperty}}</i></label>
   </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="unit" class="control-label" style="color: white">Unit: <i style="color: rgb(209, 207, 55)">{{$tenantunit}}</i></label>
   </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="Month" class="control-label" style="color: white">Month: <i style="color: rgb(209, 207, 55)">{{$tenantmonth}}</i></label>
   </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="year" class="control-label" style="color: white">Year: <i style="color: rgb(209, 207, 55)">{{$tenantyear}}</i></label>
   </div>
</div>
    </div>

</div>

       <div class="row" style="margin-top: 50px">

        <div class="col-md-12">
            <div class="panel panel-default" style="background-color: rgb(174, 177, 174)">


                        <div class="panel-body" style="max-height: 500px;background-color: white;overflow: auto">
                            <div class="row" >

                          <table class="table  table-responsive table-hover table-condensed" style="max-width: 100%;overflow-x: auto" >
                             @if (empty($singletenant))
                             <h5 class="text-danger text-center">There are no records on the table</h5>
                             @else
                             <thead>
                               <th>propertyID</th><th>PayableName</th><th>Paid</th><th>Balance</th>
                            </thead>
                            <tbody id="vacant">
                                <?php  $total=0;
                                     $paid=0;  ?>
                                @foreach ($singletenant as $single)
                                 <tr>
                                    <td>{{$single->property_id}}</td>
                                    <td>{{$single->PayableName}}</td>
                                    <td>{{$single->AmountPaid}}</td>
                                    <td>{{$single->Balance}}</td>

                                </tr>
                                @php
                                $total+=$single->Balance;
                                $paid+=$single->AmountPaid
                             @endphp
                                @endforeach
                                <thead>
                                    <th></th><th>Total Sum</th><th>{{$paid}}</th><th>{{$total}}</th>
                                 </thead>

                            </tbody>

                             @endif

                          </table><hr>

                          </div>
                    </div>
                      </div>
           </div>
       </div>

@endsection
