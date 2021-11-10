@extends('partials.loggedinlandlord')
@section('content')

<form action="{{ route('landlord.statementgenerate') }}" method="GET">
 @csrf
 <div class="row" style="margin-top: 80px;">
    <div class="col-md-3">
        <div class="form-group">
             <label for="landlordpropertyselect" style="color: white " class="control-label">Select property</label>
                 <select  name="landlordpropertyselect" id="landlordpropertyselect" class="form-control">
                     <option value="">select property</option>
                     @if (!empty($landlordproperties))
                     @foreach ($landlordproperties as $property)
                            <option value="{{ $property->PropertyID }}">{{ $property->Details }}</option>
                       @endforeach
                       @else
                         <span class="text-danger text-center">landlord has no properties</span>
                       @endif
                 </select>
        </div>
    </div>

    <div class="col-md-3">
      <div id="appendlanadlordpayablesonpropertychanged">
         @include('landlordlogin.appendlandlordpayablesonpropertychange')

      </div>
 </div>
    <div class="col-md-3">
    <div class="form-group">
     <label for="landlordmonthselect" style="color: white " class="text-center">Select month</label>
     <select name="landlordmonthselect" id="landlordmonthselect" class="form-control">
         <?php
         $months = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July ',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
         $mont=date("M");
         $ldate=Date::now()->format('l j F Y H:i:s');
         $ldate = Date::now()->format('l j F Y H:i:s');
        $ldate=explode(" ",$ldate);
        $montho=$ldate[2];
        ?>
           @foreach ($months as $key=>$month)
               <option value="{{$key}};{{$month}}"@if (isset($montho)&& $montho==$month)
               selected
           @endif>{{$month}}</option>
           @endforeach
     </select>
    </div>

    </div>
    <div class="col-md-3">
     <div class="form-group">
         <label for="landlordyearselect" style="color: white " class="text-center">Select year</label>
         <select name="landlordyearselect" id="landlordyearselect" class="form-control">
             <?php
                     $year=date("Y");
                ?>
                @for ($i =10; $i>=0; $i-=1)
                    <option value="{{$year-$i}}"@if ($year==$year-$i)
                        selected
                    @endif>{{$year-$i}}</option>
                @endfor
               </select>
     </div>
 </div>
 </div>
 <div class="row">
     <div class="col-md-3"></div>
     <div class="col-md-3"></div>
     <div class="col-md-3">
         <button type="submit" class="btn btn-success">Generate PDF</button>
     </div>
 </div>
    <div class="container" style="margin-top:10px">
    @include('partials.staffalerts')</div>
</form>
<div class="row" style="margin-top: 50px" id="appendlandlordstatements">
   @include('landlordlogin.appendlandlordstatements')
  </div>
@endsection
