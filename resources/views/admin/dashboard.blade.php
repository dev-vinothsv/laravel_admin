@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
		  <div class="row top_tiles">
		   @if(Auth::user()->hasRole('admin'))

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                  <div class="count">{!! $users_count !!}</div>
                  <h3>New Users</h3>
                  <a href="{{url('admin/users')}}"> <p>View Details</p></a>
                </div>
              </div>
               
			 @endif
              
             
            </div>
        </div>
    <!-- /page content -->
   
@endsection
