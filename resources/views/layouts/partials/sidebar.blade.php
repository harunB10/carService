<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->


        <!-- search form (Optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->

        <ul class="sidebar-menu">
@if(Auth::user()->isMechanic != 1)
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class="fa fa-circle-o text-red"></i> <span>Početna</span></a></li>
            <li><a href="/mehanicar"><i class="fa fa-circle-o text-yellow"></i></i> <span>Nađi mehaničara</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o text-green"></i> <span>Pomoć</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Uputstvo za korištenje</a></li>
                    <li><a href="#">Kontaktirajte nas</a></li>
                </ul>
            </li>
            @else
            
            <li> {{ Form::open(array('class' => 'sidebar-form', 'url' => 'pretragaAuto', 'method' => 'GET', 'files' => false)) }}
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      {{Form::close()}}</li>
      <li>
          <a href="home">
            <i class="fa fa-calendar"></i> <span>Kalendar</span>
          </a>
        </li>
            <li>
          <a href="zahtjeviZaServis">
            <i class="fa fa-envelope"></i> <span>Zahtjevi za servis</span>
            <span class="pull-right-container">
              @if(Auth::user()->isMechanic == 1)<small class="label pull-right bg-orange">{{$notifikacijeTerminBrojac}}</small>@endif
            </span>
          </a>
        </li>

             

@endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
