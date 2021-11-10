@extends('partials.404default')
@section('content')
   <h3 style="background-color: hotpink">Ooops  that page could not be found!!!!!</h3>
   <a href="{{ route('homepage') }}" class="btn btn-default">Go home</a>
@endsection
