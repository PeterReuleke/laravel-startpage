<?php

class HomeController extends BaseController {

	public function index()
	{
		$menu_items = Menu::get();
	
		return View::make('layouts.default')->with('menu_items', $menu_items);
	}

}