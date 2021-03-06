<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('admin/dashboard') }}" class="site_title"><i class="fa fa-user"></i> <span>Laravel Admin</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ asset('img/user_img.png') }}" alt="Avatar of {{ Auth::user()->first_name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->first_name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br />
        
        <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                      <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>                      
					 @if(Auth::user()->hasRole('admin'))
      				  <li><a href="{{url('admin/users')}}">Users</a></li>
      				  @endif
					    
                </ul>
              </div>
             

            </div>  
        <!-- /menu footer buttons -->
       <!--  <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
        <!-- /menu footer buttons -->
    </div>
</div>
