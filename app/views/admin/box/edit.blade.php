<?php $i = 1 ?>

@if ($box_items->count())
	<table>
		<tr>
			<th class="th3">Name</th>
			<th class="th2">Farbe</th>
			<th class="th1"></th>
			<th class="th1"></th>
		</tr>
		
	@foreach($box_items as $item)

		@if ($item->id == $box_id)
			<tr>
				<td class="td{{ if_int($i) }}"><input type="text" id="name" class="input" value="{{ $item->name }}"></td>
				<td class="td{{ if_int($i) }}"><input type="text" id="color" class="input" value="{{ $item->color }}"></td>
				<td class="td{{ if_int($i) }}"><span id="patch_Box:{{ $item->id }}" class="action_span"><img src="assets/img/check_green.gif" class="pic" /></span></td>
				<td class="td{{ if_int($i) }}"><span id="get_Box:{{ $item->menu->id }}" class="action_span"><img  src="assets/img/delete.gif" class="pic" /></span></td>
			</tr>	
		@else
			<tr>
				<td class="td{{ if_int($i) }}">{{ $item->name }}</td>
				<td class="td{{ if_int($i) }}"><span style="color: #{{ $item->color }}">{{ $item->color }}</span></td>
				<td class="td{{ if_int($i) }}"></td>
				<td class="td{{ if_int($i) }}"></td>
			</tr>
		@endif
	  
		 <?php $i++ ?>					  
	@endforeach
	</table>

@else
	<p>keine Boxen vorhanden</p>
@endif
@include('admin.color')	
