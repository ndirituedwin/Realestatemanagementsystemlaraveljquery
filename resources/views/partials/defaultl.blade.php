<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title>Propwings-{{ Session::get('companynanmee') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        {{-- <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/> --}}
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=0.9"/>

        <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{asset('css1/main1.css')}}">
        <link rel="stylesheet" href="{{asset('choosen/chosen.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminlte/adminplugins/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

    </head>
    <body>
        @include('partials.navbar')
        <div  class="container">
            @yield('content')

        </div>
        <script src="{{asset('jspdf/dist/jspdf.min.js')}}"></script>
        <script src="{{asset('js1/vendor/jquery.min.js')}}"></script>
        <script src="{{asset('js1/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('js1/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('js1/vendor/realestatescript.min.js')}}"></script>

        <script src="{{asset('js1/vendor/ff.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{asset('css1/sweetalert2.min.js')}}"></script>
        <script src="{{asset('choosen/choosen.jquery.min.js')}}"></script>
                 <!-- DataTables -->
 <script src="{{asset('adminlte/adminplugins/plugins/datatables/jquery.dataTables.js')}}"></script>
 <script src="{{asset('adminlte/adminplugins/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
            <script>
   jQuery(document).ready(function(){
    jQuery("#mydatatable").DataTable();
    jQuery("#tenantsdatatable").DataTable();
                });
              </script>

        </body>
</html>
