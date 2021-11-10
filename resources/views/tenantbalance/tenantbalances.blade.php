@extends('partials.defaultl')
@section('content')

<div class="row" style="margin-top: 70px;" >
 <div class="container">
  <div class="col-md-4">
    <label for="properties" style="color: white " class="text-center">Select property</label>
     @if (!empty($properties))
             <select name="property" id="propertytenantbalance" class="form-control">
              <option value="All;All">Select property</option>
              @foreach ($properties as $property)
                 <option value="{{$property->PropertyID}};{{$property->PropertyID}}">{{$property->PropertyID}}</option>
              @endforeach
             </select>
     @endif
  </div>
  <div class="col-md-4">
    <label for="properties" style="color: white " class="text-center">Select fieldofficer</label>
   <select name="fieldofficerselect" id="fieldofficerselect" class="form-control">
    @if (!empty($fieldofficers))
     <option value="All;All">Select fieldofficer</option>
     @foreach ($fieldofficers as $fieldofficer)
        <option value="{{$fieldofficer->employeeno}};{{$fieldofficer->employeeno}}">{{$fieldofficer->Names}} </option><br>
     @endforeach
@endif
   </select>
  </div>

  <div class="col-md-4">
    <label for="payables" style="color: white " class="text-center">Select payable</label>
   <select name="payableselect" id="payableselect" class="form-control">
    @if (!empty($payables))
     <option value="All;All">Select payable</option>
     @foreach ($payables as $payable)
        <option value="{{$payable->Code}};{{$payable->Code}}">{{$payable->details}} </option><br>
     @endforeach
@endif
   </select>
  </div>
  <div class="col-md-4">
   <label for="payables" style="color: white " class="text-center">Select month</label>
  <select name="monthselect" id="monthselect" class="form-control">
             <?php
             $months = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July ',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
             $mont=date("M");
             $ldate=Date::now()->format('l j F Y H:i:s');
             $ldate = Date::now()->format('l j F Y H:i:s');
            $ldate=explode(" ",$ldate);
            $montho=$ldate[2];
        //    dd($montho);
            ?>
               @foreach ($months as $key=>$month)
                   <option value="{{$key}};{{$month}}"@if (isset($montho)&& $montho==$month)
                   selected
               @endif>{{$month}}</option>
               @endforeach
  </select>
 </div>
 <div class="col-md-4">
   <label for="payables" style="color: white " class="text-center">Select year</label>
  <select name="yearselect" id="yearselect" class="form-control">
<?php
        $year=date("Y");
   ?>
   @for ($i =5; $i>=0; $i-=1)
       <option value="{{$year-$i}}"@if ($year==$year-$i)
           selected
       @endif>{{$year-$i}}</option>
   @endfor
  </select>
 </div>

 </div>
</div>
<div class="row" style="margin-top: 50px" id="appendtenantbalances">
  @include('tenantbalance.appendtenantbalances')
</div>













@endsection
