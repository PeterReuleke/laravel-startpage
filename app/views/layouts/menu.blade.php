@if ($menu_items->count())

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<ul class="nav navbar-nav">

		@foreach ($menu_items as $item)
			
			@if ($item->id == 1)
				<li id="navi1" class="active"><a href="#">{{ $item->name }}</a></li>
			@else
				<li id="navi{{ $item->id }}"><a href="#">{{ $item->name }}</a></li>
			@endif
			
		@endforeach
		
			<li id="admin_navi" class="inactive"><a href="#">Admin</a></li>		
		</ul>
		</div>
	 </nav>

@else
	<p class="error"><b>Fehler:</b> keine Datensätze vorhanden</p>
@endif

