<?php

class RssController extends BaseController {

	public function index($id) 
	{		
		return View::make('box.singleRss', array(
			'rss_items' => Rss::find($id)->getRss()
		));
	}
}