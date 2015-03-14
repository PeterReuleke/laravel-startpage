<div id="box{{ $item->id }}" class="box {{ $class }}" style="background-color: #{{ $item->color }};">
	<h3>{{ $item->name }}</h3>

	@if ($item->rss()->count())	
		<?php $i = 1 ?>	
		
		<div id="feed_menu">
			@foreach ($item->rss()->get() as $feed)
				@if ($i == 1)
					<span id="get_rss:box{{ $item->id }}_{{ $feed->id }}" class="action_span active">{{ $feed->name }}</span>
					<?php $rss_items = $feed->getRss() ?>	
				@else
					<span id="get_rss:box{{ $item->id }}_{{ $feed->id }}" class="action_span inactive">{{ $feed->name }}</span>			
				@endif
			
				<?php $i++ ?>				
			@endforeach		
		</div>
		<div id="feed_news">
			
			@include('box.singleRss')
			
		</div>
	@else
		<p>keine Feeds vorhanden</p>
	@endif
	
</div>