<?php

class MenuController extends BaseController {

	public function index($id) 
	{
		$menu = Menu::find($id);
	
		return View::make('box.box', array(
			'box_items' => $menu->box
		));
	}
	

}