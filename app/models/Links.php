<?php

class Links extends Eloquent {

	public $timestamps = true;
	protected $table = 'Links';
	
    protected $fillable = [
		'name',
		'url',
		'box_id'
    ];

    public function box()
    {
        return $this->belongsTo('Box');
    }
}