<div class="col-md-3">
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
    </div>
  </div>
