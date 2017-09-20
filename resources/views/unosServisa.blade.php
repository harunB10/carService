@extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection


  @section('main-content')

<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-6d-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-danger">
          <div class="panel-heading">
            <h1 class="panel-title"><b>UNOS ODRAĐENOG SERVISA:</b></h1>
          </div>

          
          <div class="panel-body">
          <div class="form-group">
          {{ Form::open(array('class' => 'form-group', 'url' => 'unosServisa2', 'method' => 'POST', 'files' => false)) }}
          <table class="table table-stripped">
          <tr>
            <td>Dijagnoza kvara:</td>
            <td colspan="2"><textarea class="form-control" rows="4" name="dijagnoza" placeholder="Unesite opis problema..."></textarea></td>
          </tr>
          <tr>
            <td>
              Odrađeni servis:
            </td>
            <td>
            <ul style="list-style-type: none">
      <li><input type="checkbox" name="ime[]" value="Zamjena ulja">Zamjena ulja</li>
    
         <li> <input type="checkbox" name="ime[]" value="Filter goriva">Filter goriva</li>
    
      <li><input type="checkbox" name="ime[]" value="Filter ulja">Filter ulja</li>
    
      <li><input type="checkbox" name="ime[]" value="Filter zraka">Filter zraka</li>
    
     <li> <input type="checkbox" name="ime[]" value="Filter kabine">Filter kabine</li>
    </ul>


    </td>

    <td>
      <ul style="list-style-type: none">
    <li><input type="checkbox" name="ime[]" value="Turbina">Turbina</li>
    
      <li><input type="checkbox" name="ime[]" value="Zamajac">Zamajac</li>
    
      <li><input type="checkbox" name="ime[]" value="Set kvačila">Set kvačila</li>
  </ul>
    </td>

    <tr>
      <td>Ostalo: </td>
      <td colspan="2"><input type="text" name="ostalo" value=""></td>
    </tr>
    <td>
          </tr>
          <tr>
            <td>Kilometraza:</td>
            <td colspan="2"><input type="text" name="kilometraza"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" class="btn btn-info" value="UNESI SERVIS"></td>
          </tr>
              </table>
              <input type="hidden" name="id" value="{{$id}}">
              {{Form::close()}}
            
          </div>
          
          </div>
        </div>
        </div>
        </div>
        </div>

@endsection