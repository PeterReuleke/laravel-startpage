@include('admin.box.index')	
<div id="alert_Box">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" id="name" class="input"><td>
		</tr>
		<tr>
			<td>Farbe</td>
			<td><input type="text" id="color"  class="input"><td>
		</tr>
		<tr>
			<td>Content Art</td>
			<td><select id="content" class="input">
				@foreach($content_items as $item)
					<option value="{{ $item->id }}">{{ $item->content }}</option>
				@endforeach
			</select></td>					
		</tr>
		<tr>
			<td></td>
			<td>
				<span id="post_Box:{{ $menu_id }}" class="action_span">Hinzufügen</span>
				<span id="get_Box:{{ $menu_id }}" class="action_span">Abbrechen</span>
			</td>
	</table>
</div>			
@include('admin.color')	