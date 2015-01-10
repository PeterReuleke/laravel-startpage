<?php

class SessionsController extends BaseController {
	
	public function create() {
		return View::make('sessions.create');
	}
	
	public function store() {
	
		if ( Auth::attempt( Input::only('name', 'password') ) ) {
		
			return "Hallo: " . Auth::user()->name;
		}
		
		return 'Fehler!';
	}
}