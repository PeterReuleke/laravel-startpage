<?php

class Links extends Eloquent {

	public $timestamps = false;
	protected $table = 'Links';

    public function box()
    {
        return $this->belongsTo('Box');
    }
}