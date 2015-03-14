window.addEvent('domready', function() {
	var z = 10;

	/*
	 * used More funtions:
	 * - Drag.Move
	 * - Sortables
	 * - Slider
	 */
	
	// Menu
	
	$$('nav .navbar-nav li').each(function(el) {
		el.addEvents({
			'click': function() {						
				$$('nav .navbar-nav li').each(function(ele){
					if (ele == el) {
						ele.set('class', 'active');
					} else {
						ele.set('class', 'inactive');
					}
				});
				
				if (el.get('id') == 'admin_navi') {
					var AjaxReq = new Request({
						url : 'Admin',
						method: 'get',
						onSuccess: function(response) {
							$('content').set('html', response);
							start_admin();
						}
					});						
				} else {
					var id = el.get('id').split('navi');
					id = id[1];
	
					var AjaxReq = new Request({
						url : 'Menu/' + id,
						method: 'get',
						onSuccess: function(response) {					
							$('content').set('html', response);
							//start_drag();
							start_sortables();
							start_rss();
						}
					});					
				}
				
				AjaxReq.send();
			}			
		});
	});
	
	//	Drag&Drop
/*	
	var start_drag = function () {	
		$$('.box').each(function(drag) {	
			new Drag.Move(drag, {
				droppables: drag,
				handle: drag.getChildren('h2'),
				onStart: function(el) {
					z++;
					el.setStyle('z-index', z);
				},
				onComplete: function(el) {
					var fx = new Fx.Morph(el, {duration: 500, wait: false});
				
					var id = el.get('id').split('box');
					id = id[1];
					
					var top  = el.getStyle('top');
					var left = el.getStyle('left');
					
					if (top.split('px')[0] < 20 && left.split('px')[0] < 5) {
						top  = 50 + 'px';
						left = 20 + 'px';
						el.setStyle(top);
						el.setStyle(left);
						fx.start({ 'top': top, 'left': left });
					}
					
					if (top.split('px')[0] < 20) {
						top = 50 + 'px';
						el.setStyle(top);
						fx.start({ 'top': top });
					}
					if (left.split('px')[0] < 5) {
						left = 20+ 'px';
						el.setStyle(left);
						fx.start({ 'left': left });
					}
					
					var data = 'top=' + top + '&left=' + left;
	
					var AjaxReq = new Request({
						url : 'Box/' + id,
						method: 'patch',
						urlEncoded: true,
						onSuccess: function(response) {
							//alert(response);
						}
					});	
					
					AjaxReq.send(data);
				}
			});
			
			drag.addEvents({
				'click': function() {
					z++;
					drag.setStyle('z-index', z);	
				}, 
				'touchstart': function() {
					z++;
					drag.setStyle('z-index', z);	
				}
			});
		});
	}
*/	
	// Rss
	
	var start_rss = function () {
		$$('#feed_menu span').each(function(el) {
		
			el.addEvent('click', function() {				
				$$('#feed_menu span').each(function(ele){
					if (ele == el) {
						ele.set('class', 'active');
					} else {
						if (ele.getOffsetParent().get('id') == el.getOffsetParent().get('id')) {
							ele.set('class', 'inactive');
						}						
					}
				});	
				
				var long_id = el.get('id').split(':'),
					help_id = long_id[1].split('_'),
					id = help_id[0],
					feed_id = help_id[1];		
		
				var AjaxReq = new Request({
					url : 'Rss/' + feed_id,
					method: 'get',
					onSuccess: function(response) {							
						$(id).getElement('#feed_news').set('html', response);				
					}
				});	
	
				AjaxReq.send();
			});
		});	
	}
	
	/** 
	 * Admin-EventHandler
	 * Restful-url: {verb}_{resource}:{id}/{action}
	 * example: get_Box:2/create => GET /Box/2/create
	 *			post_Box:3	 	 => POST /Menu/3
	 */
	var Admin_EventHandler = new Class ({
	    initialize: function (ele) {
	    	var long_id = ele.get('id').split(':');
	    	
	    	if (long_id.length > 1) {
	    		var help1_id = long_id[0].split('_');
				var help2_id = long_id[1].split('/');
	    		
				this.verb = help1_id[0];				
	    		this.resource = help1_id[1];
	        	this.id = help2_id[0];
				
				if (help2_id.length > 1) {
					this.action = help2_id[1];
				} else {
					this.action = '';
				}
	    	}	    	
	    	else
	    	{
				alert('Fehler: long_id.length <= 0');
	    	}
	    },
	    do_Request: function () {	
			var data = '';  
			
			$$('#admin_main .input').each(function(el) {
				value = string_to_url(el.get('value'));					
			
				data+= '&' + el.get('id') + '=' + value;		
			});

			var url = 'Admin/' + this.resource + '/' + this.id + '/' + this.action;

			if (url.endsWith('/')) {
				url = url.slice(0, -1);
			}
			
			var AjaxReq = new Request({
				url : url,
				method: this.verb,
				onSuccess: function(response) {			
					$('admin_main').set('html', response);				

					start_admin();

					if ($defined($('set_color'))) {
						farb_tool();			
					}	
				}
			});	

			AjaxReq.send(data);
	    }
	});
	
	var start_admin = function () {
		$$('.action_span').removeEvents('click');
		
		$$('.action_span').each(function (el) {
			el.addEvents({
				'click': function() {
					$$('#admin_menu span').each(function(ele){
						if (ele == el) {
							ele.set('class', 'active');
						} else {
							ele.set('class', 'inactive');
						}
					});

					var admin_event = new Admin_EventHandler(el);

					admin_event.do_Request();	
				}
			});
		});
	}
	
	// Farb Tool
	
	var farb_tool = function () {
		var el = $('color'),
			color;	
		
		if (el.get('value') != '') {
			color = el.get('value').hexToRgb(true);
		} else {
			color = [0,0,0];
		}	
		
		var updateColor = function(){						
			el.set('value', color.rgbToHex().substr(1,6));
			
			$('set_color').setStyle('color', color.rgbToHex());
		};
		
		$$('div.slider.advanced').each(function(el, i){			
			var slider = new Slider(el, el.getElement('.knob'), {
				steps: 255, 
				initialStep: color[i],
				wheel: true, 
				onChange: function(){				
					color[i] = this.step;
					updateColor();
				}
			}).set(color[i]);
		});
	}
	
	// string_to_url
	
	var string_to_url = function (str) {
		return str.replace(/&/gi, '%26')
				  .replace(/#/gi, '%23')
				  .replace(/\//gi, '%2F')
				  .replace(/\?/gi, '%3F');
	}
	
	// Sortables

	var start_sortables = function () {			
		var sort = new Sortables($$('.row'), {
			constrain: true,
			opacity: 0.5,
			clone: true,
			revert: true,
			onComplete: function (el) {				
				var id = el.getProperty('id').split('box');
				id = id[1];
				
				var data = 'order=' + this.serialize();

				var AjaxReq = new Request({
					url : 'Box/' + id,
					method: 'patch',
					urlEncoded: true,
					onSuccess: function(response) {						
						//alert(response);
					}
				});	
				
				AjaxReq.send(data);
			}
		});		

	}

	
	//start_drag();	
	start_sortables();
	start_rss();
});