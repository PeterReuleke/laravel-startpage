<?php

class MenuController extends BaseController {

	public function index($id) 
	{	
		return View::make('box.box', array(
			'box_items' => Box::where('menu_id', '=', $id)->orderBy('order', 'asc')->get()
		));
	}	

}