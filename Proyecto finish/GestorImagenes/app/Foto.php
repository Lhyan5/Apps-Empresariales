<?php namespace GestorImagenes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Foto extends Model{

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->{$this->getRememberTokenName()};
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->{$this->getRememberTokenName()} = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fotos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','nombre', 'descripcion', 'ruta','album_id'];
	public function album(){
		return $this->belongsTo('GestorImagenes\Album');
	}

}
