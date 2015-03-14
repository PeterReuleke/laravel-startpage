<?php

class Box extends Eloquent {

	public $timestamps = true;
	protected $table = 'Box';
		
    protected $fillable = [
		'name',
		'color',
		'menu_id',
		'content_id',
		'order',
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
	
	public function rss()
	{
		return $this->hasMany('Rss', 'box_id');
	}
}