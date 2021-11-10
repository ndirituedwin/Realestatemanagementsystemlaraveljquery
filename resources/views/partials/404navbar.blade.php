
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        {{-- <a class="navbar-brand" href="{{ route('homepage') }}">Home</a> --}}
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        {{-- <ul class=" nav navbar-nav">
            <li><a class="navbar-brand" href="{{ route('vacantunits') }}"  style="text-transform: capitalize">Vacant units</a></li>
            <li><a class="navbar-brand" href="{{ route('tenant.balances') }}"  style="text-transform: capitalize">Balances</a></li>
            <li><a class="navbar-brand" href="{{ route('tenant.viewstatement') }}"  style="text-transform: capitalize">Tenant statement</a></li>
        </ul> --}}
        <form class="navbar-form navbar-right" role="form" action="{{ route('logout') }}" method="POST">
                @csrf
            <button type="submit"  class="btn btn-success">Log out</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
