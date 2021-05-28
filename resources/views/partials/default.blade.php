<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>REMS</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}">
               <link rel="stylesheet" href="{{asset('css1/main.css')}}">
              

    </head>
    <body>
        <div class="container">
            @yield('content')
            
        </div>
             <script src="{{asset('js1/vendor/jquery.min.js')}}"></script>
               <script src="{{asset('js1/vendor/bootstrap.min.js')}}"></script>
            <script src="{{asset('js1/vendor/jquery-1.11.2.min.js')}}"></script>
            <script src="{{asset('js1/vendor/realestatescript.min.js')}}"></script>
        </body>
</html>