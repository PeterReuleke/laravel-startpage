<?php

class AdminController extends BaseController {
	
	public function index() 
	{
		return View::make('admin.index', array(
			'menu_items' => Menu::all()
		));
	}
	
	public function show($resource, $id) 
	{	
		if ($resource == 'Box') 
		{
			return View::make('admin.box.index', array(
				'box_items' => Menu::find($id)->box
			))->with('menu_id', $id);
		}
		elseif ($resource == 'Link')
		{
			return View::make('admin.links.index', array(
				'link_items' => Box::find($id)->links
			))->with('box_id', $id);	
		}
		elseif ($resource == 'Rss')
		{
			return View::make('admin.rss.index', array(
				'rss_items' => Box::find($id)->rss
			))->with('box_id', $id);	
		}
	}

	public function create($resource, $id) 
	{
		if ($resource == "Box")
		{
			return View::make('admin.box.create', array(
				'content_items' => Content::all(),
				'box_items' => Menu::find($id)->box
			))->with('menu_id', $id);	
		}
		elseif ($resource == 'Link')
		{
			return View::make('admin.links.create', array(
				'link_items' => Box::find($id)->links
			))->with('box_id', $id);	
		}
		elseif ($resource == 'Rss')
		{
			return View::make('admin.rss.create', array(
				'rss_items' => Box::find($id)->rss
			))->with('box_id', $id);	
		}		
	}

	public function store($resource, $id) 
	{	
		if ($resource == "Box")
		{
			$box = new Box;
			$box->name = Input::get('name');
			$box->color = Input::get('color');
			$box->menu_id = $id;
			$box->content_id = Input::get('content');		
			$box->pos_top = '100px';
			$box->pos_left = '100px';
			$box->save();
			
			return View::make('admin.box.index', array(
				'box_items' => Menu::find($id)->box
			))->with('menu_id', $id);
		}
		elseif ($resource == 'Link')
		{
			$link = new Links;
			$link->name = Input::get('name');
			$link->url = Input::get('url');
			$link->box_id = $id;
			$link->save();
			
			return View::make('admin.links.index', array(
				'link_items' => Box::find($id)->links
			))->with('box_id', $id);
		}
		elseif ($resource == 'Rss')
		{
			$rss = new Rss;
			$rss->name = Input::get('name');
			$rss->feed = Input::get('feed');
			$rss->box_id = $id;
			$rss->save();
			
			return View::make('admin.rss.index', array(
				'rss_items' => Box::find($id)->rss
			))->with('box_id', $id);
		}	
		
	}
	
	public function edit($resource, $id) 
	{	
		if ($resource == 'Box') 
		{
			return View::make('admin.box.edit', array(
				'box_items' => Box::find($id)->menu->box
			))->with('box_id', $id);
		} 
		elseif ($resource == 'Link')
		{
			return View::make('admin.links.edit', array(
				'link_items' => Links::find($id)->box->links
			))->with('link_id', $id);
		}
		elseif ($resource == 'Rss')
		{
			return View::make('admin.rss.edit', array(
				'rss_items' => Rss::find($id)->box->rss
			))->with('rss_id', $id);
		}	
	}
	
	public function update($resource, $id) 
	{	
		if ($resource == "Box")
		{
			$box = Box::find($id);
			$box->name = Input::get('name');
			$box->color = Input::get('color');
			$box->save();
			
			return View::make('admin.box.index', array(
				'box_items' => $box->menu->box
			))->with('menu_id', $box->menu->id);
		}
		elseif ($resource == 'Link')
		{
			$link = Links::find($id);
			$link->name = Input::get('name');
			$link->url = Input::get('url');
			$link->save();
			
			return View::make('admin.links.index', array(
				'link_items' => $link->box->links
			))->with('box_id', $link->box->id);
		}
		elseif ($resource == 'Rss')
		{
			$rss = Rss::find($id);
			$rss->name = Input::get('name');
			$rss->feed = Input::get('feed');
			$rss->save();
			
			return View::make('admin.rss.index', array(
				'rss_items' => $rss->box->rss
			))->with('box_id', $rss->box->id);
		}	
	}
	
	public function delete($resource, $id) 
	{	
		if ($resource == "Box")
		{
			return View::make('admin.box.delete', array(
				'box_items' => Box::find($id)->menu->box
			))->with('box_id', $id);
		}
		elseif ($resource == 'Link')
		{
			return View::make('admin.links.delete', array(
				'link_items' => Links::find($id)->box->links
			))->with('link_id', $id);
		}
		elseif ($resource == 'Rss')
		{
			return View::make('admin.rss.delete', array(
				'rss_items' => Rss::find($id)->box->rss
			))->with('rss_id', $id);	
		}	
	}
	
	public function destroy($resource, $id) 
	{	
		if ($resource == "Box")
		{
			$box = Box::find($id);
			$box->delete();
			
			return View::make('admin.box.index', array(
				'box_items' => $box->menu->box
			))->with('menu_id', $box->menu->id);
		} 
		elseif ($resource == 'Link')
		{
			$link = Links::find($id);
			$link->delete();
			
			return View::make('admin.links.index', array(
				'link_items' => $link->box->links
			))->with('box_id', $link->box->id);
		}
		elseif ($resource == 'Rss')
		{
			$rss = Rss::find($id);
			$rss->delete();
			
			return View::make('admin.rss.index', array(
				'rss_items' => $rss->box->rss
			))->with('box_id', $rss->box->id);
		}	
	}
	
}