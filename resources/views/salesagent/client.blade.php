
@extends('partials.defaultl')
@section('content')
<div class="" style="margin-top: 50px">

    <form action="{{ route('salesagent.pdf') }}" method="GET">
        {{-- <form method="GET" action="/sales_agent/pdf" > --}}
            @csrf
<div class="row"  >
 <div class="container">
  <div class="col-md-4">
        <div class="form-group{{$errors->has('client')?' has-error ':''}}">
            <label for="properties" style="color: white " class="text-center">Select client</label>
            <select name="client" id="clientdropdown" class="form-control " >
              @if (!empty($clientss))
                    {{-- <option value="All;All">Select client</option> --}}
                    <option value="">Select client</option>
                    @foreach ($clientss as $client)
                    <option value="{{$client->ClientNo}}">{{$client->Details}}</option>
                    @endforeach
                    @else
                    <option value="" class="text-center text-danger">No clients</option>

                    @endif
                 </select>
                 @if ($errors->has('client'))
                        <span class="help-block text-danger">{{$errors->first('client')}}</span>
                    @endif

                </div>

            </div>

 </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-3">
        <center>
            <button type="submit" class="btn btn-default" id="salesclientgpdfbtn" style="display: none">Generate pdf</button>
          </center>
    </div>
</div>
<form>

</div>
<div class="row" style="margin-top: 50px;" id="appendclientstatementshere" >
  {{-- @include('salesagent.appendclientstatements') --}}
</div>













@endsection

