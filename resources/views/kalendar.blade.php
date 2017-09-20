@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')


    {!! $event->calendar() !!}
    {!! $event->script() !!}

@endsection
