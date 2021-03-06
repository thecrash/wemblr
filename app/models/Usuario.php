<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

/*POr temas de convencion se crea el model con la primera letra en mayus y sin "s" al final 
 para que el ORM sepa que el nombre de la tabla es todo en minus y con "s" al final 
 sin necesidad de declarar la tabla a la que apunta*/
 /*SE CAMBIA EL EXTENDS ELOQUENT POR ARDENT*/
class Usuario extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';//Aqui se le indica el nombre de la tabla si no se sigue la convencion

	protected $primaryKey='id';//Aqui se le indica el primary key de no se "ID"
	
	/**
	 * Ardant validation rules
	 *
	 * @var array
	 */	
	public static $rules= array(
		/*"=>'required" estas ccaracterisitecas hacen que el ardent valide desde aqui en el model y no en el controler */
		'name' =>'required' , 
		'username' =>'required|unique:usuarios,username' ,
		'email' =>'required|unique:usuarios,email' ,
		'bio' =>'max:160' ,
		'password' =>'required|min:8|confirmed' ,
		'password_confirmation' =>'same:password' 
	);

	/**
	 * Ardent: purge redundant attributes
	 *
	 * @var array
	 */
	
	public $autoPurgeRedundantAttributes=true;

	public static $passwordAttributes= array('password');
	public $autoHashPasswordAttributes= true;
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/*funcion que es la relacion de usuarios y post*/
	public function posts()
	{
		return $this->hasMany('Post');
	}

}
