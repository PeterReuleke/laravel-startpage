<?php

class LinkController extends BaseController {
	
	public function index($id) 
	{	
		return View::make('admin.links.index', array(
			'link_items' => Box::find($id)->links
		))->with('box_id', $id);
	}

} 