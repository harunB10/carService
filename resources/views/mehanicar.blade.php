  @extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection

@section('main-content')
<script type="text/javascript" src="{{ asset('/js/ratertemp.js') }}"></script>
<div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Uputstvo!</h4>
        Pretraživanje vršite tako što izaberete državu i grad, te će Vam se nakon toga prikazati spisak dostupnih automehaničara.
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">


                    <div class="panel-body">
                        <div class="form-group">



                           {{ Form::open(array('class' => 'form-horizontal', 'url' => '', 'files' => false)) }}
<fieldset>

<!-- Form Name -->
<legend>Pretraga autoservisa</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Država</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">Bosna i Hercegovina</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="categories">Grad</label>
  <div class="col-md-4">
    <select id="categories" name="categories" class="form-control">
    <option disabled selected value> -- Izaberite grad -- </option>
      @foreach($gradovi as $grad)
      <option value="{{$grad->grad}}">{{$grad->grad}}</option>
      @endforeach
    </select>
  </div>
</div>

</fieldset>
{{ Form::close() }}

                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>

                <th>Naziv firme</th>
                <th>Adresa</th>
                <th>#</th>

                </thead>
            </tr>
            <tbody id="podaci">

</tbody></table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

  $('#categories').on('change', function(e){
    var cat_id = e.target.value;

    //ajax
    $.get('/ajax-subcat?cat_id=' + cat_id, function(data){

      $('#podaci').empty();

      $.each (data, function(index, subcatObj){
         $('#podaci').append('<tr><td><a href='+"/mehanicar/profil/"+subcatObj.id+'>'+subcatObj.nazivFirme+'</td>'


          +'<td>'+subcatObj.adresa+'</td>'
          +'<td><a href='+"/mehanicar/profil/"+subcatObj.id+' class="btn btn-info"><strong>PROFIL</strong></a></td></tr>');




      });

    });

  });
</script>


@endsection
