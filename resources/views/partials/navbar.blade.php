{{-- <nav class="navbar navbar-default  navbar-fixed-top ">
    <div class="container-fluid">
      <div class="navbar-header">
        {{-- <a class="navbar-brand" href="{{ route('home') }}">Chatty</a> --}}
      {{-- </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class=" nav navbar-nav">
            <li><a href="{{ route('homepage') }}" ><b>Home</b></a></li>
            <li><a href="tenantbalances" ><b>Tenants</b></a></li>
            <li><a href="tenantstatement"><b>Tenant statement</b></a></li>
        </ul> --}}


      {{--<ul class="nav navbar-nav navbar-right " style="margin-right: 50px" >
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-primary" type="submit" style="border: none;margin-top:18px;"><b>Logout</b></button>
                      {{-- <button type="submit" class="btn btn-success pull-right" style="margin-top: 5px;border:none">Logout</button> --}}

                   {{--</form>

            </li>
        </ul>

      </div>
    </div>
  </nav> --}}
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('homepage') }}" style="text-transform: capitalize;color: yellow">{{(Session::get('companynanmee'))?Session::get('companynanmee'):''}}</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class=" nav navbar-nav">
            <li><a class="navbar-brand" href="{{ route('vacantunits') }}"  style="text-transform: capitalize">Vacant units</a></li>
            <li><a class="navbar-brand" href="{{ route('tenant.balances') }}"  style="text-transform: capitalize">Balances</a></li>
            <li><a class="navbar-brand" href="{{ route('tenant.viewstatement') }}"  style="text-transform: capitalize">Tenant statement</a></li>
        </ul>
        <form class="navbar-form navbar-right" role="form" action="{{ route('logout') }}" method="POST">
                @csrf
            <button type="submit"  class="btn btn-success">Log out</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
