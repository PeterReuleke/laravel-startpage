@include('admin.rss.index')	
<div id="alert_Box">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" id="name" class="input"><td>
		</tr>
		<tr>
			<td>URL</td>
			<td><input type="text" id="feed" size="60" class="input"><td>
		</tr>
		<tr>
			<td></td>
			<td>
				<span id="post_Rss:{{ $box_id }}" class="action_span">Hinzufügen</span>
				<span id="get_Rss:{{ $box_id }}" class="action_span">Abbrechen</span>
			</td>
	</table>
</div>