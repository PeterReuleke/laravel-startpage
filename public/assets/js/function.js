window.addEvent('domready', function() {
	var z = 10;


	// Menu
	
	$$('#menu #navi li').each(function(el) {
		el.addEvents({
			'click': function() {						
				$$('#menu #navi li').each(function(ele){
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
							start_drag();
							start_rss();
						}
					});					
				}
				
				AjaxReq.send();
			}			
		});
	});
	




	//	Drag&Drop
	
	var start_drag = function () {	
		$$('.box').each(function(drag) {	
			new Drag.Move(drag, {
				droppables: drag,
				handle: drag.getChildren('.box_head'),
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
			
			drag.addEvent('click', function() {
				z++;
				drag.setStyle('z-index', z);			
			});
		});
	}
	
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
	
	
	start_drag();	
	start_rss();
});