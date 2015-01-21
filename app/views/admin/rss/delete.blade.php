@include('admin.rss.index')			
<div id="alert_Box">
	<p>Wollen Sie diese Feed wirklich löschen?</p>
	<span id="delete_Rss:{{ $rss_id }}" class="action_span">Ja</span>
	<span id="get_Rss:{{ Rss::find($rss_id)->box->id }}" class="action_span">Nein</span>
</div>