@if ($box_items->count())			
	@foreach ($box_items as $item)		
	
		@if ($item->content_id == 1)
			<?php $class = "link_box" ?>
			@include('box.links')
		@elseif ($item->content_id == 2)
			<?php $class = "rss_box" ?>
			@include('box.rss')
		@else
			<p class="error"><b>Fehler:</b> keine Inhalte vorhanden</p>
		@endif
	
	@endforeach		
@else
	<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
@endif
		
