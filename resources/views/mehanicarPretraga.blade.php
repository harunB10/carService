  @extends('layouts.app')

  @section('htmlheader_title')
  Home
  @endsection

  @section('main-content')
  <link rel="stylesheet" type="text/css" href="{{ asset("/css/mehanicarProfil.css") }}">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-info">
          <div class="panel-heading">
            <h1 class="panel-title"><b>{{ $mehanicari -> nazivFirme }}</b></h1>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ asset('/img/servis.png') }}" class="img-circle img-responsive"> </div>


                <script type="text/javascript" src="{{ asset('/js/ratertemp.js') }}"></script>



                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td></td>
                        <td><div class="rate2" data-rate-value = "{{ $ocjena }}"></div></td>

                      </tr>
                      <tr>
                        <td>Vlasnik:</td>
                        <td><b>{{ $mehanicari -> vlasnik }}</b></td>
                      </tr>
                      <tr>
                        <td>Adresa:</td>
                        <td><b>{{ $mehanicari -> adresa }}, {{ $mehanicari -> zipCode }}, {{ $mehanicari -> grad }}</b></td>
                      </tr>
                      <tr>
                        <td>Broj telefona:</td>
                        <td><b>{{ $mehanicari -> brojTelefona }}</b></td>
                      </tr>

                      <tr>
                       <tr>

                       </tr>
                       <tr>

                       </tr>
                       <tr>
                        <td>Email</td>
                        <td><b><a href="mailto:info@support.com">{{ $mehanicari -> email }}</a></b></td>
                      </tr>
                      <td>Radno vrijeme: </td>
                      <td><b>{{ date('G', strtotime($mehanicari -> radnoVrijemeOd)) }} -
                        {{ date('G', strtotime($mehanicari -> radnoVrijemeDo)) }}h</b>

                        <br><br><span id="radnoVrijeme"></span>
                      </td>


                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <p><a href="/{{$mehanicari->id}}/zakaziTermin" class="btn btn-danger"><strong>ZAKAŽI TERMIN</strong></a></p>
        <script type="text/javascript">
                        var radnoVrijeme = document.getElementById("radnoVrijeme");
                        var currentdate = new Date();
                        var vrijeme = currentdate.getHours();

                        if({{ date('G', strtotime($mehanicari -> radnoVrijemeOd)) }} <= vrijeme && {{ date('G', strtotime($mehanicari -> radnoVrijemeDo)) }} > vrijeme){
                          radnoVrijeme.innerHTML = "<b>OTVORENO</b>";
                          radnoVrijeme.style.color = "green";
                          }
                          else{
                            radnoVrijeme.innerHTML = "<b>ZATVORENO</b>";
                            radnoVrijeme.style.color = "red";
                          }
                      </script>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBVsomDwvzmyql0kZH4FMeieVqSaJKGmjg"></script>
<script>
var myCenter=new google.maps.LatLng({{$mehanicari->latitude}}, {{$mehanicari->longitude}});
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:16,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="googleMap" style="width:553px;height:380px;"></div>
        <div class="panel-footer">


        </div>

      </div>
    </div>
  </div>
</div>
@endsection
