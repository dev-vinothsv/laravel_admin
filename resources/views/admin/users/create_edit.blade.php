@extends('layouts.blank')

@push('stylesheets')
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
				<h3>	@if (isset($user))
							Update User
						@else
							Add User
						@endif
				</h3>
			</div>

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
						<h2>	
							@if (isset($user))
								Update User
							@else
								Add User
							@endif
					  </h2>
				
							<div class="clearfix"></div>
						</div>


						<div class="x_content">
							<section id="web-application">
									<form class="form-horizontal" method="post"
									action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif"
									autocomplete="off">
										<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
										<div class="tab-content">
											<div class="tab-pane active" id="tab-general">
												<div class="col-md-12">
													<div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
														<label class="col-md-2 control-label" for="first_name">{{
															Lang::get('admin/users.first_name') }}</label>
														<div class="col-md-4">
															<input class="form-control" tabindex="1"
																placeholder="{{ Lang::get('admin/users.first_name') }}" type="text"
																name="first_name" id="first_name"
																value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}">
															{!! $errors->first('first_name', '<label class="control-label"
																for="email">:message</label>')!!}
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label" for="name">{{
															Lang::get('admin/users.last_name') }}</label>
														<div class="col-md-4">
															<input class="form-control" tabindex="1"
																placeholder="{{ Lang::get('admin/users.last_name') }}" type="text"
																name="last_name" id="last_name"
																value="{{{ Input::old('last_name', isset($user) ? $user->last_name : null) }}}">
														</div>
													</div>
												</div>
												<div class="col-md-12">
												<div class="form-group">
														<label class="col-md-2 control-label" for="company_name">{{
															Lang::get('admin/users.company_name') }}</label>
														<div class="col-md-4">
															<input class="form-control" type="text" tabindex="4"
																placeholder="{{ Lang::get('admin/users.company_name') }}" name="company_name"
																id="company_name"
																value="{{{ Input::old('company_name', isset($user) ? $user->company : null) }}}" />

													</div></div>
												</div>
												@if(!isset($user))
												<div class="col-md-12">
													<div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
														<label class="col-md-2 control-label" for="email">{{
															Lang::get('admin/users.email') }}</label>
														<div class="col-md-4">
															<input class="form-control" type="email" tabindex="4"
																placeholder="{{ Lang::get('admin/users.email') }}" name="email"
																id="email"
																value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
															{!! $errors->first('email', '<label class="control-label"
																for="email">:message</label>')!!}
														</div>
													</div>
												</div>
												</div>
												@endif
												<div class="col-md-12">
													<div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
														<label class="col-md-2 control-label" for="password">{{
															Lang::get('admin/users.password') }}</label>
														<div class="col-md-4">
															<input class="form-control" tabindex="5"
																placeholder="{{ Lang::get('admin/users.password') }}"
																type="password" name="password" id="password" value="" />
															{!!$errors->first('password', '<label class="control-label"
																for="password">:message</label>')!!}
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group {{{ $errors->has('password_confirmation') ? 'has-error' : '' }}}">
														<label class="col-md-2 control-label" for="password_confirmation">{{
															Lang::get('admin/users.password_confirmation') }}</label>
														<div class="col-md-4">
															<input class="form-control" type="password" tabindex="6"
																placeholder="{{ Lang::get('admin/users.password_confirmation') }}"
																name="password_confirmation" id="password_confirmation" value="" />
															{!!$errors->first('password_confirmation', '<label
																class="control-label" for="password_confirmation">:message</label>')!!}
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-">
														<label class="col-md-2 control-label" for="confirm">{{
															Lang::get('admin/users.activate_user') }}</label>
														<div class="col-md-3">
															<select class="form-control" name="confirmed" id="confirmed" tabindex="7">
																<option value="1" {{{ ((isset($user) && $user->confirmed == 1)? '
																	selected="selected"' : '') }}}>{{{ Lang::get('admin/users.yes')
																	}}}</option>
																<option value="0" {{{ ((isset($user) && $user->confirmed == 0) ?
																	' selected="selected"' : '') }}}>{{{ Lang::get('admin/users.no')
																	}}}</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<br>
												</div>
												<div class="col-md-12">
														<div class="form-group {{{ $errors->has('roles') ? 'has-error' : '' }}}">
																<label class="col-md-2 control-label" for="roles">{{
																	Lang::get('admin/users.roles') }}</label>
																<div class="col-md-5">
																	<select name="roles[]" id="roles" multiple style="width: 100%;" tabindex="8">
																		@foreach ($roles as $role)
																		<option value="{{{ $role->id }}}" {{{ ( array_search($role->id,
																			$selectedRoles) !== false && array_search($role->id,
																			$selectedRoles) >= 0 ? ' selected="selected"' : '') }}}>{{{
																			$role->name }}}</option> @endforeach
																	</select> {!!$errors->first('roles', '<label
																class="control-label" for="roles">:message</label>')!!}
																</div>
														</div>
												</div>
												
											
												
												
												

												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-6">
														<button type="submit" class="btn btn-sm btn-success">
															<span class="glyphicon glyphicon-ok-circle"></span>
																@if	(isset($user))
																	{{ Lang::get("admin/modal.update") }}
																@else
																	{{Lang::get("admin/modal.create") }}
																@endif
														</button>
														<a class="btn btn-sm btn-default" href="{{ url('admin/users') }}"> <span class="glyphicon glyphicon-remove-circle"></span> {{
														trans("admin/users.back") }}</a>
													</div>
												</div>
											</div>
										</div>
									</form>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@stop
 @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});

</script>
@stop
