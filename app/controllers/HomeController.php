<?php

class HomeController extends BaseController {

	public function index($menu_id = 1)
	{	
		return View::make('layouts.default', array(
			'menu_items' => Menu::all(),
			'box_items' => Menu::find($menu_id)->box
		));
	}

}

