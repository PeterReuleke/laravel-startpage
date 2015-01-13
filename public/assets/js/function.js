window.addEvent('domready', function() {
	var z = 10;

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
	
	start_drag();	
});