<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Propwings-{{ Session::get('companynanmeet') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{asset('css1/main1.css')}}">
        <link rel="stylesheet" href="{{asset('choosen/chosen.min.css')}}">

        <style type="tex/css">
            .container2{
                margin-top: -20px;
                margin-left: 200px;
            }

            .tenantname{
                margin-left:200px;
                margin-top: -100px
            }
            .stmttenant th{
                /* border: 1px solid; */
                border-bottom: 1px solid #ffffff;
                width: 40%;
                /* padding: 12px; */
                width: 20%;
                /* width: 12px; */
            }
            .stmtrow {
                border-bottom: 1px solid rgb(116, 116, 116);
                text-align: center;
                color: blue;
                /* border: 1px solid; */
                /* padding-left: 15px;
                padding-right: 15px; */


            }
            </style>
    </head>
    <body>
        @include('partials.tenantnavbar')
        <div  class="container">
            @yield('content')

        </div>
        <script src="{{asset('jspdf/dist/jspdf.min.js')}}"></script>
        <script src="{{asset('js1/vendor/jquery.min.js')}}"></script>
        <script src="{{asset('js1/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('js1/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('js1/vendor/realestatescript.min.js')}}"></script>
        {{-- <script src="{{asset('js1/sweetalert2/sweetalert2.min.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{asset('css1/sweetalert2.min.js')}}"></script>
        <script src="{{asset('choosen/choosen.jquery.min.js')}}"></script>

        </body>
</html>
