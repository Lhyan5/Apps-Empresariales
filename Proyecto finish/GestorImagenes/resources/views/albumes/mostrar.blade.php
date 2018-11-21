@extends('app')

@section('content')
@if(Session::has('creado'))
	<div class="alert alert-success">
		<p>El álbum ha sido creado</p>
	</div>
@endif
@if(Session::has('actualizado'))
	<div class="alert alert-success">
		<p>El álbum ha sido actualizado</p>
	</div>
@endif
@if(Session::has('eliminado'))
	<div class="alert alert-danger">
		<p>El álbum ha sido eliminado</p>
	</div>
@endif

<div class="container-fluid">
<p><a href="/validado/albumes/crear-album" class="btn btn-primary" role=button>Crear Álbum</a></p>
@if(sizeof($albumes)>0)
	@foreach($albumes as $index => $album)
		@if($index%3==0)
	<div class="row">
		@endif
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<div class="caption">
					<h3>{{$album->nombre}}</h3>
					<p>{{$album->descripcion}}</p>
					<p><a href="/validado/fotos?id={{$album->id}}" class="btn btn-primary" role=button>Ver Fotos</a></p>
<p><a href="/validado/albumes/actualizar-album/{{$album->id}}" class="btn btn-primary" role=button>Editar Álbum</a></p>
<form action="/validado/albumes/eliminar-album" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token()}}" required>
	<input type="hidden" name="id" value="{{$album->id}}" required>
	<input class="btrn btn-danger" role="button" type="submit" value="Eliminar">
</form>
				</div>
			</div>
		</div>
	@if(($index+1)%3==0)		
	</div>
	@endif
	@endforeach
@else
<div class="alert alert-danger">
	<p>Alparecer no tienes álbumes.Crea uno!</p>
</div>
@endif
</div>
@endsection
