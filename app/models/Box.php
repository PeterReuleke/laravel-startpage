<?php

class Box extends Eloquent {

	public $timestamps = false;
	protected $table = 'Box';

    public function menu()
    {
        return $this->belongsTo('Menu');
    }
}