@if ($menu_items->count())

	<div id="menu">
		<ul id="navi">

		@foreach ($menu_items as $item)
			
			@if ($item->id == 1)
				<li id="navi1" class="active"><span id="navi_span1">{{ $item->name }}</span></li>
			@else
				<li id="navi{{ $item->id }}" class="inactive"><span id="navi_span{{ $item->id }}">{{ $item->name }}</span></li>
			@endif
			
		@endforeach
		
			<li id="admin_navi" class="inactive"><span id="admin_span">Admin</span></li>		
		</ul>
	 </div>

@else
	<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
@endif