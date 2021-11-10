<div class="form-group">
    <label for="landlordonpropayableselect" style="color: white " class="control-label">Select payable</label>
     <select name="landlordonpropayableselect" id="landlordonpropayableselect" class="form-control">
         <option value="All">All</option>
          @if (!empty($propertypayables))
          @foreach ($propertypayables as $payable)
          <option value="{{ $payable->payable }}">{{ $payable->PayableName }}</option>
          @endforeach

          @endif

     </select>
</div>
