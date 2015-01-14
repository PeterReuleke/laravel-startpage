<?php

class Links extends Eloquent {

	public $timestamps = true;
	protected $table = 'Links';

    public function box()
    {
        return $this->belongsTo('Box');
    }
}