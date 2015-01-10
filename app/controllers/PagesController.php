<?php

class PagesController extends BaseController {

	public function start() {
		$name = 'Frank';

		return View::make('start')->with('name', $name);
	}

}