@extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection


  @section('main-content')
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/datepicker.css') }}">
  <script type="text/javascript" src="{{asset('/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/highlight.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/html5shiv.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/respond.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/bootstrap-clockpicker.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery-clockpicker.min.css') }}">
  <script type="text/javascript" src="{{asset('/js/jquery-clockpicker.min.js')}}"></script>
   <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-danger">
          <div class="panel-heading">
            <h1 class="panel-title"><b>ZAKAZIVANJE TERMINA ZA SERVIS</b></h1>
          </div>
          <div class="panel-body">
          <div class="form-group">
          {{ Form::open(array('class' => 'form-horizontal', 'url' => 'dodajTermin', 'files' => false)) }}
              <table class="table table-stripped">

                <tr>
                  <td><b>Naziv firme:</b></td>
                  <td>{{$mehanicar->nazivFirme}} <input type="hidden" name="id" value={{$mehanicar->id}}></td>
                </tr>
                <tr>  
                  <td><b>Vrsta servisa:</b></td>
                  <td><select class="form-control" name="vrstaServisa" id="vrstaServisa">
                    <option>Veliki servis</option>
                    <option>Mali servis</option>
                    <option>Drugo</option>
                  </select></td>
                </tr>
                <tr>
                  <td><b>Datum</b></td>
                  <td><b>Vrijeme</b></td>
                </tr>
                <tr>
                  <td><div class="input-group date" data-provide="datepicker">
    <input id="datum" type="text" class="form-control" name="datum">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div></td>
              <td><div id="sat" name="sat" class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
    <input type="text" class="form-control" value="08:00" name="vrijeme">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>  
<script type="text/javascript">
$('#sat').clockpicker();
</script>
</td>
                </tr>
                <tr>
                  <td><input type="submit" value="POŠALJI ZAHTJEV" class="btn btn-success"></td>
                  <td><a href="/mehanicar/"><input type="button" class="btn btn-danger" value="VRATI SE NA PRETRAGU"></a></td>
                </tr>
              </table>
              {{ Form::close() }}
          </div>
          
          </div>
        </div>
        </div>
        </div>
        </div>

<script type="text/javascript">
  $('#datum').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});

</script>


  @endsection