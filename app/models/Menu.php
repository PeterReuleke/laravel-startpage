<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Menu extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;
/*	
	protected $fillable = ['name', 'password', 'email'];
	

	public static $rules = [
		'name' => 'required',
		'password' => 'required',
		'email' => 'required'
	];
*/


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Menu';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
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
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	public function getRememberToken()
	{
	    return $this->remember_token;   
	}
	
	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	} 
	
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	


}