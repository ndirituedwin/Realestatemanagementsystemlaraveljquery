
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

        <ul class="nav navbar-nav landlordnavbar">
            <li><a class="navbar-brand yellow"  href="javascript:void(0)"   style="text-transform: capitalize;color: yellow" >{{($companydetails[0]->CompanyName)?$companydetails[0]->CompanyName:'' }}</a></li>
            <li><a class="navbar-brand active" href="{{ route('saleclient.welcome') }}"  >Preview statement</a></li>
            <li><a class="navbar-brand active" href="{{ route('salesclient.vacantunits')}}"  >Vacant Units</a></li>

        </ul>
        <form class="navbar-form navbar-right" role="form" action="{{ route('logout') }}" method="POST">
                @csrf
            <button type="submit"  class="btn btn-success">Log out</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
