@include('admin.box.index')			
<div id="alert_Box">
	<p>Wollen Sie diese Box wirklich löschen?</p>
	<span id="delete_Box:{{ $box_id }}" class="action_span">Ja</span>
	<span id="get_Box:{{ Box::find($box_id)->menu->id }}" class="action_span">Nein</span>
</div>