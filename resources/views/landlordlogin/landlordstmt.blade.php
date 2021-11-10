@extends('partials.loggedinlandlord')
@section('content')
<form action="{{ route('landlord.lltransactions') }}" method="GET">
    @csrf
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-4">
            <div class="form-group">
                 <label for="ladlorstmtselect" style="color: white " class="control-label">Select property</label>
                     <select  name="ladlorstmtselect" id="ladlorstmtselect" class="form-control">
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
        <div class="col-md-4">
            <div class="form-group">
             <label for="landlordstmtmonthselect" style="color: white " class="text-center">Select month</label>
             <select name="landlordstmtmonthselect" id="landlordstmtmonthselect" class="form-control">
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
            <div class="col-md-4">
             <div class="form-group">
                 <label for="landlordstmtyearselect" style="color: white " class="text-center">Select year</label>
                 <select name="landlordstmtyearselect" id="landlordstmtyearselect" class="form-control">
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
        <div class="col-md-3">
         {{-- <center> --}}
            <input type="submit" id="pre_view_stmt_ll" class="btn btn-danger" value="Preview">
        {{-- </center> --}}
         <p style="">
             @include('partials.alerts')

         </p>
        </div>
        <div class="col-md-3">

            <input style="display: none" type="submit" id="generatepdfforlltransactions" class="btn btn-success" value="Generate pdf">
        </div>

    </div>
    <div class="row" style="margin-top:  50px" id="appentstmtllhere">
        {{-- @include('landlordlogin.appendllstmt') --}}
       </div>
</form>

@endsection
