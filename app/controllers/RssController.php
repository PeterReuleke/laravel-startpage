<?php

class RssController extends BaseController {

	public function index($id) 
	{		
		return Rss::find($id)->getRss();;
	}
}