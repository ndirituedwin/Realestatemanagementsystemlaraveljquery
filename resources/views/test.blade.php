@extends('partials.defaultl')
@section('content')
   <h3 style="background-color: hotpink">Ooops  that page could not be found!!!!!</h3>
   <a href="{{ route('welcome') }}" class="btn btn-default">Go home</a>  
   <p>{{session('data')['password']}}</p> 
@endsection