
@extends('partials.defaultl')
@section('content')
<div class="" style="margin-top: 50px">

<div class="row"  >
 <div class="container">
  <div class="col-md-4">
    <label for="projects" style="color: white " class="text-center">Select project</label>
     @if (!empty($projects))
             <select name="projectselect" id="projectselect" class="form-control">
              <option value="All">Select project</option>
              @foreach ($projects as $project)
                 <option value="{{$project->recid}}">{{$project->details}}</option>
              @endforeach
             </select>
     @endif
  </div>

  <div class="col-md-4">
    <label for="statusselect" style="color: white " class="text-center">Select status</label>
    <select name="projectstatuselect" id="projectstatuselect" class="form-control">
        <option value="All">Select status</option>
        <option value="Available">Available</option>
        <option value="Sold">Sold</option>
        <option value="Booked">Booked</option>
        <option value="Giveaway">Give away</option>
    </select>

  </div>
 </div>
</div>
</div>
<div class="row" style="margin-top: 50px;" id="appendprojectstatuseshere" >
  @include('salesagent.appendprojectstatus')
</div>













@endsection

