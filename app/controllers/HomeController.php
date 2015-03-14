<?php

class HomeController extends BaseController {

	public function index($menu_id = 1)
	{	
		return View::make('layouts.default', array(
			'menu_items' => Menu::all(),
			'box_items' => Box::where('menu_id', '=', $menu_id)->orderBy('order', 'asc')->get()
		));
	}

}