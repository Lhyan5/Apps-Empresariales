<?php namespace GestorImagenes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Album extends Model{

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
	protected $table = 'albumes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','nombre', 'descripcion', 'usuario_id'];
	public function fotos(){
		return $this->hasMany('GestorImagenes\Foto');
	}
	public function propietario(){
		return $this->belongsTo('GestorImagenes\Usuario');
	}

}
