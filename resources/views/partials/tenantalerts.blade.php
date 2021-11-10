

@if (Session::has('tenantdanger'))
    <div class="alert alert-danger alert-dismissible fade-show   " role="alert">{{Session::get('tenantdanger')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>

    </div>
@endif
@if (Session::has('tenantsuccess'))
    <div class="alert alert-success alert-dismissible fade-show   " role="alert">{{Session::get('tenantsuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>

    </div>
@endif
@if (Session::has('tenantinfo'))
    <div class="alert alert-info alert-dismissible fade-show   " role="alert">{{Session::get('tenantinfo')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>

    </div>
@endif
