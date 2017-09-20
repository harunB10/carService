@extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection


  @section('main-content')
  @if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {!! session('flash_notification.message') !!}
    </div>
@endif
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-info">
          <div class="panel-heading">
            <h1 class="panel-title"><b>ZAHTJEVI ZA SERVIS</b></h1>
          </div>
          <div class="panel-body">
          
          <div class="form-group">
          
              <table class="table table-stripped">
              @foreach($zahtjevi as $zahtjev)
              <tr>
                <td>{{$zahtjev->name}}</td>
                <td><b>{{date("d.m.Y", strtotime($zahtjev->startTime))}} u {{$zahtjev->end}}</b></td>
                <td><b>{{$zahtjev->vrstaServisa}}</b></td>

              
                <td><a href="prihvatiZahtjev/{{$zahtjev->id}}"><button class="btn btn-success"><img src="{{ asset('/img/prihvati.ico') }}" height="30px" width="30px"></button></a></td>
                <td><a href="odbijZahtjev/{{$zahtjev->id}}"><button class="btn btn-danger"><img src="{{ asset('/img/odbij.png') }}" height="30px" width="30px"></button></a></td>
              </tr>
               @endforeach
              </table>
              
          </div>
         

  </div>
  </div>
  </div>
  </div>
  </div>
  @endsection