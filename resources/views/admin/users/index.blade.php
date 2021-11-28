@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

<!-- page content -->
<div class="right_col" role="main">
@include('includes.notifications')
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>{!! trans("admin/users.users") !!}</h3>
			</div>

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>{!! trans("admin/users.users") !!}</h2>
							<div class="pull-right">
								<a href="{!! url('admin/users/create') !!}"
									class="btn btn-sm  btn-primary"><span
									class="glyphicon glyphicon-plus-sign"></span> {{
									trans("admin/users.add_user") }}</a>
							</div>
							<div class="clearfix"></div>
						</div>


						<div class="x_content">
							<section id="web-application">
									<table id="table"
									class="table table-striped table-bordered nowrap"
									cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>{!! trans("admin/users.name") !!}</th>
											<th>{!! trans("admin/users.email") !!}</th>
											<th>{!! trans("admin/users.active_user") !!}</th>
											<th>{!! trans("admin/admin.created_at") !!}</th>
											<th>{!! trans("admin/admin.action") !!}</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->





<script type="text/javascript">
  var oTable;
	function deleteUser(user_id){
		if (confirm('Do you want to delete the user?')) {
			 $.ajax({
					url: '/admin/users/delete',
					type: 'POST',
					data: {id:user_id },
				    success: function(response) {
				    	$('#table').DataTable().ajax.reload()
					},error: function(response){
						$('#table').DataTable().ajax.reload()
				    }
			});
		}		  

     }
    $(document).ready(function () {

  
        oTable = $('#table').DataTable({

            "oLanguage": {
                "sProcessing": "{{ trans('table.processing') }}",
				"sInfo": "Showing _START_ to _END_ of _TOTAL_ users", "sInfoEmpty": "Showing 0 to 0 of 0 users",
                "sLengthMenu": "{{ trans('table.showmenu') }}",
                "sZeroRecords": "{{ trans('table.noresult') }}",
                "sEmptyTable": "{{ trans('table.emptytable') }}",
                "sInfoFiltered": "{{ trans('table.filter') }}",
                "sInfoPostFix": "",
                "sLengthMenu": "_MENU_ per page",
                "sSearch": "{{ trans('table.search') }}:",
                "sUrl": "",
                "sType": "html",

                "oPaginate": {
                    "sFirst": "{{ trans('table.start') }}",
                    "sPrevious": "{{ trans('table.prev') }}",
                    "sNext": "{{ trans('table.next') }}",
                    "sLast": "{{ trans('table.last') }}"
                }
            },
            "processing": true,
            "serverSide": true,
			"scrollX":true,
			"scrollCollapse": true,
            "order": [],
            "ajax": "{{ url('admin/users/data') }}",
			columns: [
					{data: 'username', name: 'username',searchable: true},
					{data: 'email', name: 'email'},
					{data: 'confirmed', name: 'confirmed',orderable: false, searchable: false},
					{data: 'created_at', name: 'created_at',orderable: false, searchable: false},
					{data: 'actions', name: 'actions', orderable: false, searchable: false}
				],

        });
    });
    </script>
@endsection



