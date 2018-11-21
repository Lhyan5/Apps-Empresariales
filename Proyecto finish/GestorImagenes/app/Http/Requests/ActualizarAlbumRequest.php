<?php namespace GestorImagenes\Http\Requests;

use GestorImagenes\Http\Requests\Request;
use GestorImagenes\Album;
use Illuminate\Support\Facades\Auth;

class ActualizarAlbumRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$user=Auth::user();
		$id=$this->get('id');
		$album=Album::where('usuario_id','=',$id)->get();
		if($album){
			return true;
		}
		return false;
	}
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id'=>'required|exists:albumes,id',
			'nombre'=>'required',
			'descripcion'=>'required',
			//1
		];
	}

}
