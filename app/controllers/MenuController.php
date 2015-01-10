<?php

class MenuController extends BaseController {
	
	protected $menu;
	
	public function __construct(Menu $menu) 
	{
		$this->menu = $menu;
	}
	
	public function index() 
	{
		$menu = $this->menu->all();
	
		return View::make('menu.index', ['menu' => $menu]);
	}
	
	public function create() 
	{
		return View::make('menu.create');
	}
	
	public function store() {

	}
}