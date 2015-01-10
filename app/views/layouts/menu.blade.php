		@if ($menu_items->count())
		
			<div id="menu">
				<ul id="navi">
		
				@foreach ($menu_items as $item)
					
					@if ($item->ID == 1)
						<li id="navi1" class="active"><span id="navi_span1">{{ $item->Name }}</span></li>
					@else
						<li id="navi{{ $item->ID }}" class="inactive"><span id="navi_span{{ $item->ID }}">{{ $item->Name }}</span></li>
					@endif
					
				@endforeach
				
					<li id="admin_navi" class="inactive"><span id="admin_span">Admin</span></li>		
				</ul>
			 </div>
		
		@else
			<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
		@endif