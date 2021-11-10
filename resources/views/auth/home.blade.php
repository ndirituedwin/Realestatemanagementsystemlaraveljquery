@extends('partials.defaultl')
@section('content')
<div class="" style="margin-top: 10px">
  {{-- <a href="tenantbalances" class="btn btn-success pull-left">Go to Tenants page</a> --}}
  {{-- <form method="POST" action="{{ route('logout') }}">
  @csrf
    <button type="submit" class="btn btn-success pull-right">Logout</button>

  </form> --}}

</div>
<div class="row" style="margin-top: 50px;" >
 <div class="container">
  <div class="col-md-4">
    <label for="properties" style="color: white " class="text-center">Select property</label>
     @if (!empty($properties))
             <select name="property" id="propertyselect" class="form-control">
              <option value="All;All">Select property</option>
              @foreach ($properties as $propertie)
                 <option value="{{$propertie->PropertyID}};{{$propertie->PropertyID}}">{{$propertie->PropertyID}}</option>
              @endforeach
             </select>
     @endif
  </div>
  <div class="col-md-4">
    <label for="properties" style="color: white " class="text-center">Select category</label>
   <select name="category" id="categoryselect" class="form-control">
    <option value="All;All">select category</option>
    @if (!empty($categories))
       @foreach ($categories as $category)
       <option  value="{{$category->recid}};{{$category->Code}}" >{{$category->Description}}</option>
       @endforeach
    @endif
   </select>
  </div>

  <div class="col-md-4">
    <label for="properties" style="color: white " class="text-center">Select status</label>
   <select name="selectstatus" id="selectstatus" class="form-control">

       <option  value="All">Select Status</option>
       <option  value="Occupied">Occupied</option>
       <option  value="Vacant" selected>Vacant</option>

   </select>
  </div>

 </div>
</div>
<div class="row" style="margin-top: 50px;" id="appendvacantunits" >
  @include('auth.appendvacantunits')
</div>













@endsection
