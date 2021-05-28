@extends('partials.defaultl')
@section('content')
       <div class="row" style="margin-top: 50px">
 
        <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading text-center" style="font-size: 150%" >vacant unit
                           <center>
                            <input type="text" id="search" name="search" placeholder="Search" style="width: 40%" class="form-control">
                           </center>

                        </div>

                        <div class="panel-body" style="max-height: 500px;overflow: auto">
                            <div class="row" >

                          <table class="table  table-responsive table-hover table-condensed" style="max-width: 100%;overflow-x: auto" >
                             @if (empty($vacantunit))
                             <h5 class="text-danger text-center">There are no records on the table</h5>
                             @else
                             <thead>
                               <th>Unit</th><th>Category</th><th>Location</th><th>rent amount</th>
                            </thead>
                            <tbody id="vacant">
                               @foreach ($vacantunit as $vacantunit)
                               <tr>
                                 <td>{{$vacantunit->unit}}</td>
                                 <td>{{$vacantunit->category}}</td>
                                 <td>{{$vacantunit->location}}</td>
                                 <td>{{$vacantunit->rent_amount}}</td>
                              </tr>
                               @endforeach

                            
                            </tbody>
                             @endif
                          </table>

                        </div>
                       
                    </div>
                      </div>
           </div>
       </div>
      
@endsection