@include('admin.links.index')	
<div id="alert_Box">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" id="name" class="input"><td>
		</tr>
		<tr>
			<td>URL</td>
			<td><input type="text" id="url" size="60" class="input"><td>
		</tr>
		<tr>
			<td></td>
			<td>
				<span id="post_Link:{{ $box_id }}" class="action_span">Hinzufügen</span>
				<span id="get_Link:{{ $box_id }}" class="action_span">Abbrechen</span>
			</td>
	</table>
</div>			