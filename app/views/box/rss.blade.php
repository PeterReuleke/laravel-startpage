<div id="box{{ $item->id }}" class="box {{ $class }}" style="background-color: #{{ $item->color }}; top: {{ $item->pos_top }}; left: {{ $item->pos_left }};">
	<div class="box_head">{{ $item->name }}</div>
	<div class="box_body">

	@if ($item->rss()->count())
	
		<?php $i = 1 ?>	
		
		<div id="feed_menu">
		@foreach ($item->rss()->get() as $feed)
			@if ($i == 1)
				<span id="get_rss:box{{ $item->id }}_{{ $feed->id }}" class="action_span active">{{ $feed->name }}</span>
				<?php $text = $feed->getRss() ?>	
			@else
				<span id="get_rss:box{{ $item->id }}_{{ $feed->id }}" class="action_span inactive">{{ $feed->name }}</span>			
			@endif
			
			<?php $i++ ?>				
		@endforeach
		
		</div>
		<div id="feed_news">
			{{ $text }}
		</div>
	@else
		<p>keine Feeds vorhanden</p>
	@endif
	
	</div>
</div>


