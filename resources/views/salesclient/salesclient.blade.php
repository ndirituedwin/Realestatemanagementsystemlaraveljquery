@extends('partials.salesclientdefault')
@section('content')
<div class="" style="margin-top: 50px">

    <form method="get" action="{{ route('salesaclientpdf') }}" >
        @csrf

<div class="row"  >
 <div class="container" >
  <div class="col-md-4"  style="margin-top: 25px">
    <button type="submit" class="btn btn-default" >Generate pdf</button>
            </div>

 </div>
</div>

<form>
</div>
<div class="row" style="margin-top: 50px;" id="appendclientstatementshere" >
  @include('salesclient.appendsalesclientstatements')
</div>













@endsection
