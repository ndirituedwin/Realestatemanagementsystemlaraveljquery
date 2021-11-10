

@if (Session::has('staffdanger'))
    <div class="alert alert-danger alert-dismissible fade-show   " role="alert">{{Session::get('staffdanger')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>

    </div>
@endif
@if (Session::has('staffsuccess'))
    <div class="alert alert-success alert-dismissible fade-show   " role="alert">{{Session::get('staffsuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>

    </div>
@endif
@if (Session::has('staffinfo'))
    <div class="alert alert-info alert-dismissible fade-show   " role="alert">{{Session::get('staffinfo')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>

    </div>
@endif
