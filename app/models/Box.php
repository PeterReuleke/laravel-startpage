<?php

class Box extends Eloquent {

	public $timestamps = false;
	protected $table = 'Box';
	
    protected $fillable = [
        'pos_top',
        'pos_left'
    ];

    public function menu()
    {
        return $this->belongsTo('Menu');
    }
	
	public function links()
	{
		return $this->hasMany('Links', 'box_id');
	}
}