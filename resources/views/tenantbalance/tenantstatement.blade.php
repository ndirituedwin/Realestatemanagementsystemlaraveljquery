@extends('partials.defaultl')
@section('content')
<div class="" style="margin-top: 60px">
  </div>
  <div class="row">
    <form action="{{ route('tenant.makestatement')}}" method="GET">
        @csrf
      <div class="container">
        <div class="col-md-3">
            <div class="form-group{{$errors->has('property')?' has-error ':''}}">
                <label for="properties" style="color: white " class="text-center">Select property</label>
                @if (!empty($properties))
                <select name="property" id="propertyfill" class="form-control">
                    <option value="All;All">Select property</option>
                    @foreach ($properties as $property)
                    <option value="{{$property->PropertyID}};{{$property->PropertyID}}">{{$property->PropertyID}}</option>
                    @endforeach
                </select>
                @if ($errors->has('property'))
                <span class="help-block" id="span">{{$errors->first('property')}}</span>
                @endif
                @endif
            </div>
          </div>
          <div id="appendtenatshere">
               @include('tenantbalance.appendtenants')
          </div>
          <div class="col-md-3">
            <div class="form-group{{$errors->has('datefrom')?' has-error ':''}}">
            <label for="datefrom" style="color: white " class="text-center">Date from</label>
            <?php
           $cdate=date('Y-m-d');
          //dd($cdate);
          $explode=explode("-",$cdate);
          $lastyear=$explode[0]-1;
          $month=$explode[1];
          $day=$explode[2];
          //first
          $lastyear.="-";
          $lastyear.=$month;
          $lastyear.="-";
          $lastyear.=$day;
            ?>
            <input type="date" value="<?php echo $lastyear;?>" name="datefrom" id="datefrom" class="form-control">
            @if ($errors->has('datefrom'))
            <span class="help-block" id="span">{{$errors->first('datefrom')}}</span>
            @endif
        </div>
          </div>
          <div class="col-md-3">
            <div class="form-group{{$errors->has('dateto')?' has-error ':''}}">

                <label for="dateto" style="color: white " class="text-center">Date to</label>
                <input type="date" value="<?php echo date('Y-m-d');?>" name="dateto" id="dateto" class="form-control">
                @if ($errors->has('dateto'))
                <span class="help-block" id="span">{{$errors->first('dateto')}}</span>
                @endif
            </div>
          </div>



      </div>
  </div>
  <div class="row">
    <div class="container">


    </div>
</div>
  <div class="row " style="margin-top: 1%" >
      <div class="container">
          <div class="col-md-3"></div>
          <div class="col-md-4">
        <button type="submit"  id="generatetenantstatement" class="btn btn-danger">Preview</button>

        </div>
        <div class="col-md-2">
           <button type="submit"  class="btn btn-success" id="displayblock" style="display: none">Generate PDF</button></div>
           </form>
        </div>
      </div>
  </div>
<div class="row">
    <div class="container">
        <div class="col-md-2"></div>
        <div id="singletenantstatement">
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
 </div>

@endsection
