		@if ($box_items->count())
		
			<div>
			
			
		
				@foreach ($box_items as $item)
				
					<p>{{ $item->name }}</p>
					
					
				@endforeach
				
			</div>
		
		@else
			<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
		@endif