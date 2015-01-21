<?php $i = 1 ?>

@if ($link_items->count())
	<table>
		<tr>
			<th class="th3">Name</th>
			<th class="th4">URL</th>
			<th class="th1"></th>
			<th class="th1"></th>
		</tr>
		
	@foreach($link_items as $item)

		@if ($item->id == $link_id)
			<tr>
				<td class="td{{ if_int($i) }}"><input type="text" id="name" class="input" value="{{ $item->name }}"></td>
				<td class="td{{ if_int($i) }}"><input type="text" id="url" class="input" value="{{ $item->url }}"></td>
				<td class="td{{ if_int($i) }}"><span id="patch_Link:{{ $item->id }}" class="action_span"><img src="assets/img/check_green.gif" class="pic" /></span></td>
				<td class="td{{ if_int($i) }}"><span id="get_Link:{{ $item->box->id }}" class="action_span"><img  src="assets/img/delete.gif" class="pic" /></span></td>
			</tr>	
		@else
			<tr>
				<td class="td{{ if_int($i) }}">{{ $item->name }}</td>
				<td class="td{{ if_int($i) }}">{{ $item->url }}</td>
				<td class="td{{ if_int($i) }}"></td>
				<td class="td{{ if_int($i) }}"></td>
			</tr>
		@endif
	  
		 <?php $i++ ?>					  
	@endforeach
	</table>

@else
	<p>keine Links vorhanden</p>
@endif