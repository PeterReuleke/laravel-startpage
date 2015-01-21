<?php $i = 1 ?>

@if ($rss_items->count())
	<table>
		<tr>
			<th class="th3">Feed Name</th>
			<th class="th4">Feed Adresse</th>
			<th class="th1"></th>
			<th class="th1"></th>
		</tr>
		
	@foreach($rss_items as $item)
	
		<tr>
			<td class="td{{ if_int($i) }}">{{ $item->name }}</td>
			<td class="td{{ if_int($i) }}">{{ $item->feed }}</td>
			<td class="td{{ if_int($i) }}"><span id="get_Rss:{{ $item->id }}/edit" class="action_span"><img src="assets/img/edit.gif" class="pic" /></span></td>
			<td class="td{{ if_int($i) }}"><span id="get_Rss:{{ $item->id }}/delete" class="action_span"><img src="assets/img/delete.gif" class="pic" /></span></td>
		</tr>
	  
		 <?php $i++ ?>					  
	@endforeach
	</table>

@else
	<p>keine Feeds vorhanden</p>
@endif

@if (!isset($box_id))
	<?php $box_id = Rss::find($rss_id)->box->id ?>
@endif
<br /><span id="get_Rss:{{ $box_id }}/create" class="action_span">Neuen Rss-Feed hinzufügen</span><br />