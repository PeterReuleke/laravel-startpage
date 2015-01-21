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

		@if ($item->id == $rss_id)
			<tr>
				<td class="td{{ if_int($i) }}"><input type="text" id="name" class="input" value="{{ $item->name }}"></td>
				<td class="td{{ if_int($i) }}"><input type="text" id="feed" class="input" value="{{ $item->feed }}"></td>
				<td class="td{{ if_int($i) }}"><span id="patch_Rss:{{ $item->id }}" class="action_span"><img src="assets/img/check_green.gif" class="pic" /></span></td>
				<td class="td{{ if_int($i) }}"><span id="get_Rss:{{ $item->box->id }}" class="action_span"><img  src="assets/img/delete.gif" class="pic" /></span></td>
			</tr>	
		@else
			<tr>
				<td class="td{{ if_int($i) }}">{{ $item->name }}</td>
				<td class="td{{ if_int($i) }}">{{ $item->feed }}</td>
				<td class="td{{ if_int($i) }}"></td>
				<td class="td{{ if_int($i) }}"></td>
			</tr>
		@endif
	  
		 <?php $i++ ?>					  
	@endforeach
	</table>

@else
	<p>keine Rss-Feeds vorhanden</p>
@endif