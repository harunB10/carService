@if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {!! session('flash_notification.message') !!}
    </div>
@endif
<div>
<style type="text/css">
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 60px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Korisnički račun
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img style="cursor: pointer;" id = "pop" class="profile-user-img img-responsive img-circle" src="{{ asset('/img/volkswagenlogo.jpg') }}" alt="User profile picture"></a>


            <div id = "modal" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Izmjena korisničke slike</h4>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                      <label for="inputSlika" class="col-sm-2 control-label">Slika</label>

                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputSkills">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-primary">Spremi izmjene</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <script type="text/javascript">

              $('#pop').on('click', function(){
                $('#modal').modal('show');
              });


            </script>
            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">Korisnik od: {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Registrovanih vozila: </b> <a class="pull-right">{{ $brojAuta }}</a>
              </li>
              <li class="list-group-item">
                <b>Broj odrađenih servisa:</b> <a class="pull-right">{{ $brojServisa }}</a>
              </li>

              <li class="list-group-item">
                <strong><i class="fa fa-map-marker margin-r-5"></i> Lokacija:</strong>

                <p class="text-muted">Bihać, Bosnia and Herzegovina</p>
              </li>



            </ul>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        @if($brojAuta == 0)
        <div class = "box box-primary">
          <div class="box-header with-border">
            <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-block btn-success btn-lg">Dodaj auto</button>
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Izaberite proizvođača i model</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('url' => 'dodajAuto', 'files'=>true)) !!}
        <table class="table table-hover">
        <tr>
        <td>Proizvođač: </td>
        <td>
                    <select name = "proizvodjac" id="proizvodjac" class="form-control">
                    <option><p>--IZABERI PROIZVOĐAČA--</p></option>
                    @foreach($vozila as $m)

                            <option><p>{{$m->title}}</p></option>
                    @endforeach
                        </select>
                        </td>
        </tr>
        <tr>
        <td>Model</td>
        <td>
                        <select name="model" id="model" class="form-control">

                        </select>
        </td>
        </tr>
        <tr>
          <td>Broj motora: </td>
          <td><input type="text" name="brojMotora"></td>
        </tr>
        <tr>
          <td>Snaga [kW]: </td>
          <td><input type="text" name="snaga"></td>
        </tr>
        <tr>
          <td>Broj vrata: </td>
          <td><select name="brojVrata">
            <option>2/3</option>
            <option>4/5</option>
          </select></td>
        </tr>
        <tr>
          <td>Vrsta motora: </td>
          <td><select name="vrstaMotora">
            <option>Dizel</option>
            <option>Benzin</option>
            <option>Električni pogon</option>
            <option>Hibrid</option>
          </select></td>
        </tr>

        <tr>
          <td>Kubikaža: </td>
          <td><input type="text" name="kubikaza"></td>
        </tr>

        <tr>
          <td>Boja: </td>
          <td><input type="text" name="boja"></td>
        </tr>
        <tr>
          <td>Slika: </td>
          <td><input type="file" name="slika"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="DODAJ" class="btn btn-block btn-info btn-lg"></td>

        </tr>

                        {!!Form::close()!!}
                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
      </div>
    </div>

  </div>
</div>
          </div>
        </div>
        @else
        @foreach ($auta as $auto)



        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b>{{ $auto->proizvodjac }} {{ $auto->model }} {{ $auto->other }}</b></h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">

            <strong><i class="fa fa-fw fa-car margin-r-5"></i>Broj šasije motora</strong>

            <p >
             {{ $auto->brojMotora }}
           </p>

           <strong><i class="fa fa-pencil margin-r-5"></i> Dodatna oprema</strong>

           <p>
            <span class="label label-danger">AC</span>
            <span class="label label-success">ABS</span>
            <span class="label label-info">Servo</span>
            <span class="label label-warning">Senzor za kišu</span>
            <span class="label label-primary">ESP</span>
          </p>

          <hr> <br>

          <strong><i class="fa fa-file-text-o margin-r-5"></i> Slika</strong>

          <p><img id="myImg" src="/slike/{{$auto->slika}}" width="50%" height="50%"></p>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
        </div>
        <!-- /.box-body -->
      </div>
      @endforeach
      @endif<!-- /.box -->
    </div>

    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab"><b>Moji servisi</b></a></li>
          <li><a href="#timeline" data-toggle="tab"><b>Termini servisa</b></a></li>
          <li><a href="#settings" data-toggle="tab"><b>Uredi postavke</b></a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            @foreach ($servisi as $servis)
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{asset('/img/servis.png')}}" alt="user image">
                <span class="username">
                  <a href="/profil/1">{{ $servis->nazivFirme }}</a>
                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                </span>

                <span class="description">{{ date('F d, Y, H:m', strtotime($servis->datumServisa)) }}</span>
              </div>
              <!-- /.user-block -->
              <table class="table table-hover">
                <tr>
                  <td><strong>Vozilo:</strong></td>
                  <td>{{ $servis->manufacturer }} {{ $servis->model }} {{ $servis->other }}</td>

                </tr>
                <tr>
                  <td>
                    <strong>Dijagnoza:</strong></td>
                    <td>

                      {{ $servis->dijagnozaKvara }}</p></td>

                    </tr>

                    <tr>
                      <td><strong>Odrađeni servis:</strong></td>
                      <td>{{ $servis->servis }}</td>

                    </tr>
                    <tr>
                      @if($servis->ocjena == NULL)
                      <td> <strong>Koliko ste zadovoljni ovom uslugom?</strong></td>

                      <td>
                        {{ Form::model($servis->id, [
                          'method' => 'put',
                          'route' => ['ocjena', $servis->id]]) }}

                          <div id="{{$servis->id}}" class="rate"></div>
                          <input id="input2" type="hidden" name="unos">

                          <button id="{{$servis->created_at}}" type="submit" class="btn btn-primary btn-sm">Ocijeni</button>
                          <script type="text/javascript">

                           $(document).ready(function(){

                            $('#{{$servis->id}}').click(function(){
                              $('#{{$servis->created_at}}').fadeIn();
                            });
                          });

                        </script>
                      </td>
                      <script type="text/javascript" src="{{ asset('/js/ratertemp.js') }}"></script>

                      {{ Form::close() }}

                      @endif
                    </table>


                  </div>

                  @endforeach
                  <!-- /.post -->
                  <!-- Post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  @foreach($notifikacijeTermin as $notifikacija)
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-red">
                        {{ date('F d, Y', strtotime($notifikacija->startTime)) }}
                      </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <img src="{{ asset('/img/service.png') }}" class="fa"></img>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{$notifikacija->end}}</span>

                        <h3 class="timeline-header"><a href="mehanicar/profil/{{$notifikacija->idMehanicar}}">{{$notifikacija->nazivFirme}}</a> je prihvatio Vaš zahtjev za servis</h3>

                        <div class="timeline-body">
                          Ukoliko niste u mogućnosti doći u navedeni termin, molimo Vas da na vrijeme kontaktirate mehaničara!
                        </div>

                      </div>
                    </li>

                    
                  </ul>
                  @endforeach
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">

                    <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputRepeatPassword" class="col-sm-2 control-label">Repeat password</label>

                      <div class="col-sm-10">
                        <input class="form-control" id="inputRepeatPassword" type="password" placeholder="RepeatPassword"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<script type="text/javascript">
    $('#proizvodjac').on('change', function(e){
      var proizvodjac = e.target.value;
      $.get('ajax-auto?proizvodjac=' + proizvodjac, function(data){
        $('#model').empty();
        $.each(data, function(index, subcatObj){
          $('#model').append('<option>'+subcatObj.title+'</option>');
        });
      });
    });
  </script>
<script type="text/javascript">
  // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
  <!-- ./wrapper -->
