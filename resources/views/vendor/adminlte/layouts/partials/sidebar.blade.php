<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <!-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a> -->
                    <i class="fa fa-sign-out"></i><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form-2').submit();">
                                                                {{ trans('adminlte_lang::message.signout') }}
                    </a>

                    <form id="logout-form-2" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="submit" value="logout" style="display: none;">
                    </form>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>-->
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            @if(Auth::user()->hasRole('admin'))
                <li><a href="{{ route('usuarios.index') }}"><i class='fa fa-user'></i><span>Usuarios</span></a></li>
                <li><a href="{{ route('archivos.cargar') }}"><i class='fa fa-upload'></i><span>Cargar Archivos</span></a></li>
                <li><a href="{{ route('deudores.index') }}"><i class='fa fa-users'></i><span>Deudores</span></a></li>
                <li><a href="{{ route('gestores.index') }}"><i class='fa fa-folder-open-o'></i><span>Gestores</span></a></li>
               <!-- <li><a href="{{ route('gestiones.index') }}"><i class='fa fa-gears'></i><span>Gestiones</span></a></li>
                <li><a href="{{ route('documentos.index') }}"><span>Documentos</span></a></li>
                <li><a href="{{ route('regiones.index') }}"><span>Regiones</span></a></li>
                <li><a href="{{ route('provincias.index') }}"><span>Provincias</span></a></li>
                <li><a href="{{ route('comunas.index') }}"><span>Comunas</span></a></li>-->
            @endif
            @if(Auth::user()->hasRole('supervisor'))
                <li><a href="{{ route('usuarios.index') }}"><i class='fa fa-user'></i><span>Usuarios</span></a></li>
            @endif
            <!--<li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>-->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
