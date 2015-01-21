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
	
		<tr>
			<td class="td{{ if_int($i) }}">{{ $item->name }}</td>
			<td class="td{{ if_int($i) }}">{{ $item->url }}</td>
			<td class="td{{ if_int($i) }}"><span id="get_Link:{{ $item->id }}/edit" class="action_span"><img src="assets/img/edit.gif" class="pic" /></span></td>
			<td class="td{{ if_int($i) }}"><span id="get_Link:{{ $item->id }}/delete" class="action_span"><img src="assets/img/delete.gif" class="pic" /></span></td>
		</tr>
	  
		 <?php $i++ ?>					  
	@endforeach
	</table>

@else
	<p>keine Links vorhanden</p>
@endif

@if (!isset($box_id))
	<?php $box_id = Links::find($link_id)->box->id ?>
@endif
<br /><span id="get_Link:{{ $box_id }}/create" class="action_span">Neuen Link hinzufügen</span><br />