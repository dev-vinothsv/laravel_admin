<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       	<meta name="_token" content="{!! csrf_token() !!}"/>

        <title>Laravel Admin </title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
        <link href="{{ asset("css/dataTables.bootstrap.css") }}" rel="stylesheet">
     	 <link href="{{ asset("css/site.css") }}" rel="stylesheet">	
  		<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script> 
        <!-- Bootstrap -->
        <!-- <script src="{{ asset("js/bootstrap.min.js") }}"></script> -->
        <!-- Custom Theme Scripts -->
        <!-- <script src="{{ asset("js/gentelella.min.js") }}"></script> -->
		 <!-- jQuery -->
		   
        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

				@include('includes/footer')
		      </div>
        </div>


    <!-- Bootstrap -->
    <script src="{{ asset("js/admin.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset("js/vendors/fastclick/lib/fastclick.js") }}"></script>
    <!-- NProgress -->
   
    <script src="{{ asset("js/vendors/skycons/skycons.js") }}"></script>
    <script src="{{ asset('js/jquery-ui.1.11.2.min.js') }}"></script>
	<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
	<script src="{{asset('js/bootstrapValidator.js')}}" type="text/javascript" charset="utf-8"></script>
    
     <!-- Custom Theme Scripts -->
    <script src="{{ asset("js/custom.min.js") }}"></script>
	<script type='text/javascript'>	
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		</script>
        @stack('scripts')

    </body>
</html>
