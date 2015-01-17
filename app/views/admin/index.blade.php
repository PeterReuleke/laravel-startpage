<div id="admin">
	<div id="admin_menu">
		<table>
			<tr>
				<th class="th3">Boxen verwalten</th>
			</tr>		
						
	@if ($menu_items->count())
		<?php $i = 1 ?>
		@foreach ($menu_items as $item)
			<tr>
				<td class="td{{ if_int($i) }} td3"><span id="get_Box:{{ $item->id }}" class="action_span inactive">{{ $item->name }}</span></td>
			</tr>
			<?php $i++ ?>
		@endforeach
	@else
		<p>keine Eintäge vorhanden</p>
	@endif

		</table>
	</div>
	<div id="admin_main"></div>
</div>