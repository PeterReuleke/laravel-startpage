<?php

class BoxController extends BaseController {

	public function update($id) 
	{
		$aOrder = explode(",", Input::get('order'));
		
		$i = 0;
		
		foreach($aOrder as $o) {
			$box_id = explode("box", $o)[1];
			
			$box = Box::find($box_id);
			$box->order = $i;
			$box->save();
			
			$i++;
		}
	}

}