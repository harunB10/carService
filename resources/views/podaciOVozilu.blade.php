@extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection


  @section('main-content')
   <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">


                    <div class="panel-body">
                        <div class="form-group">
                        <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Proizvođač</th>
                              <th>Model</th>
                              <th>Datum servisa</th>
                              <th>Dijagnoza kvara</th>
                              <th>Odrađeni servis</th>
                              <th>Kilometraža</th>
                              <th>Auto servis</th>
                            </tr>
                          </thead>
                          <tbody>
                        @foreach($podaciOVozilu as $p)
                            <tr>
                                <td>{{$p->proizvodjac}}</td>
                                <td>{{$p->model}}</td>
                                <td>{{$p->datumServisa}}</td>
                                <td>{{$p->dijagnozaKvara}}</td>
                                <td>{{$p->servis}}</td>
                                <td>{{$p->kilometraza}}</td>
                                <td>{{$p->nazivFirme}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>

  @endsection