@extends('app')

@section('content'))

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar sesión</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Al parecer algo esta mal.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if (Session::has('csrf'))
						<div class="alert alert-danger">
							<strong>whoops!</strong> Al parecer algo esta mal.<br><br>
							{{Session::get('csrf')}}
						</div>
					@endif

					@if(Session::has('recuperada'))
					<div class="alert alert-success">
							<strong>Esta hecho!</strong> Cambios realizados<br><br>
							{{Session::get('recuperada')}}
					</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/validacion/inicio">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recordarme
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Iniciar Sesión
								</button>

								<a href="/validacion/recuperar">Olvidé mi contraseña</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
