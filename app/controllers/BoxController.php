<?php

class BoxController extends BaseController {

	public function update($id) 
	{
		$box = Box::find($id);
		
		$box->pos_top = Input::get('top');
		$box->pos_left = Input::get('left');
		$box->save();
	}

}