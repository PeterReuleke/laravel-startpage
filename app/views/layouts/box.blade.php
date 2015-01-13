@if ($box_items->count())			
		@foreach ($box_items as $item)
		
			<div id="box{{ $item->id }}" class="box link_box" style="background-color: #{{ $item->color }}; top: {{ $item->pos_top }}; left: {{ $item->pos_left }};">
				<div class="box_head">{{ $item->name }}</div>
				<div class="box_body">
			
				@if ($item->links()->count())
					@foreach ($item->links()->get() as $link)
						{{ HTML::link($link->url, $link->name) }}<br />							
					@endforeach
				@else
					<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
				@endif
				
				</div>
			</div>
		@endforeach		
@else
	<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
@endif
		
