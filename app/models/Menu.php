<?php

class Menu extends Eloquent  {

	public $timestamps = true;
	protected $table = 'Menu';

	public function box() 
	{
		return $this->hasMany('Box', 'menu_id');
	}


}