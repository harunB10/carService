@extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection


  @section('main-content')

<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-warning">
          <div class="panel-heading">
            <h1 class="panel-title"><b>PRONAĐENO VOZILO:</b></h1>
          </div>

          
          <div class="panel-body">
          <div class="form-group">
          <table class="table table-stripped">
          @foreach($pretragaAuto as $p)
            
                <tr>
                    <td>Broj šasije motora:</td>
                    <td><b>{{$p->brojMotora}}</b></td>
                </tr>
                <tr>
                    <td>Prozivođač:</td>
                    <td>{{$p->proizvodjac}}</td>
                </tr>
                <tr>
                    <td>Model:</td>
                    <td>{{$p->model}}</td>
                </tr>
                <tr>
                    <td>Vrsta motora:</td>
                    <td>{{$p->vrstaMotora}}</td>
                </tr>
                <tr>
                    <td>Snaga u kW:</td>
                    <td>{{$p->snaga}}</td>
                </tr>
                <tr>
                    <td>Broj vrata:</td>
                    <td>{{$p->brojVrata}}</td>
                </tr>
                <tr>
                    <td>Kubikaža:</td>
                    <td>{{$p->kubikaza}}</td>
                </tr>

                <tr>
                    <td>Slika:</td>
                    <td><img id="myImg" src="/slike/{{$p->slika}}" width="50%" height="50%"></td>
                </tr>

                
                <tr>
                  <td><a href="/unosServisa/{{$p->id}}"><input type="button" class="btn btn-success" value="UNESI SERVIS"></a></td>
                  <td><a href="/podaciOVozilu/{{$p->brojMotora}}"><input type="button" class="btn btn-danger" value="PREGLED SERVISA"></a></td>
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