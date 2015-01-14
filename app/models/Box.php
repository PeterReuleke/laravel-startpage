<?php

class Box extends Eloquent {

	public $timestamps = true;
	protected $table = 'Box';
	
	public $content = array();
	//public $content_id;
	
    protected $fillable = [
        'pos_top',
        'pos_left'
    ];
	
	public function __construct() {
		//$this->content = $this->content_id;
	}

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