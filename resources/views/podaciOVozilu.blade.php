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
                        @foreach($podaciOVozilu as $p)
                            <tr>
                                <td>Dijagnoza kvara</td>
                                <td>{{$p->dijagnozaKvara}}</td>
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