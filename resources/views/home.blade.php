  @extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection


  @section('main-content')
  @if(Auth::user()->isMechanic == 1)
    @include('mehanicarProfil')
  @else
    @include('korisnik')
  @endif
  @endsection
