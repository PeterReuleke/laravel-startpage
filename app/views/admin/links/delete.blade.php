@include('admin.links.index')			
<div id="alert_Box">
	<p>Wollen Sie diesen Link wirklich löschen?</p>
	<span id="delete_Link:{{ $link_id }}" class="action_span">Ja</span>
	<span id="get_Link:{{ Links::find($link_id)->box->id }}" class="action_span">Nein</span>
</div>