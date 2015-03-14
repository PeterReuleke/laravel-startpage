@if ($box_items->count())	

	<div class="row">
	<?php $c = 0 ?>
		
	@foreach ($box_items as $item)			
		@if ($item->content_id == 1)
			<?php $class = "link_box col-sm-6 col-md-3 col-lg-2" ?>
			@include('box.links')
		@elseif ($item->content_id == 2)
			<?php $class = "rss_box col-sm-6 col-md-3 col-lg-2" ?>
			@include('box.allRss')
		@else
			<p class="error"><b>Fehler:</b> keine Inhalte vorhanden</p>
		@endif		
	@endforeach		
	
	</div>
	
@else
	<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
@endif
		
