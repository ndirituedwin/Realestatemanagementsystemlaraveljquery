<div class="col-md-3">
    <div class="form-group{{$errors->has('tenant')?' has-error ':''}}">
        <label for="properties" style="color: white " class="text-center">Select tenant</label>
     @if (!empty($tenants))
      <select name="tenant" id="tenantfill" class="form-control choosen" >
                {{-- <option value="All;All">Select tenant</option> --}}
                <option value="">Select tenant</option>
                @foreach ($tenants as $tenant)
                <option value="{{$tenant->Code}};{{$tenant->Code}};{{$tenant->details}}">{{$tenant->details}}</option>
                @endforeach
             </select>

             @endif

    </div>
  </div>
