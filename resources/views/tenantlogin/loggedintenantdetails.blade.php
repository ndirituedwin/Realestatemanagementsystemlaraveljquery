<?php
 use App\Models\Tenantbalance;
?>
@extends('partials.loggedintenant')
@section('content')
<a href="{{ route('tenant.balances') }}" class="btn btn-warning" style="margin-top: 10px">Go back</a>
<div class="row" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="property" class="control-label" style="color: white">Property: <i style="color: rgb(209, 207, 55)">{{($loggedintenantproperty)?$loggedintenantproperty:''}}</i></label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone" class="control-label" style="color: white">Unit: <i style="color: rgb(209, 207, 55)">{{($loggedintenantunit)?$loggedintenantunit:''}}</i></label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tenantname" class="control-label" style="color: white">Tenant name: <i style="color: rgb(209, 207, 55)">{{($loggedintenantname)?$loggedintenantname:''}}</i></label>
   </div>
</div>
</div>
</div>
<form  action="{{ route('loggedtenant.generatepdf')}}" method="GET">
    @csrf
    <input type="hidden" name="loggedtenantcode" id="loggedtenantcode" value="{{ $loggedinusertcode }}">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <div class="form-group{{$errors->has('datefrom')?' has-error ':''}}">
                <label for="datefrom" style="color: white " class="text-center">Start Date </label>
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

<div class="row" style="">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <button class="btn btn-success" id="loggedtenantstatementbtn" style="">Preview statement</button></div>


           <button class="btn btn-success" style="display: none" id="generate_pddf" style="">Generate pdf</button>
          </div>
        </form>
        <div class="row">
            <div class="container">
                <div class="col-md-2"></div>
                <div id="loggedtenantstatement">
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
@endsection
