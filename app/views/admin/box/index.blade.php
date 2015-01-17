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

		@if ($item->content_id == 1)
			<?php $resource = "Link" ?>
		@elseif ($item->content_id == 2)
			<?php $resource = "Rss" ?>
		@endif
	
		<tr>
			<td class="td{{ if_int($i) }}"><span id="get_{{ $resource }}:{{ $item->id }}" class="action_span">{{ $item->name }}</span></td>
			<td class="td{{ if_int($i) }}"><span style="color: #{{ $item->color }}">{{ $item->color }}</span></td>
			<td class="td{{ if_int($i) }}"><span id="get_Box:{{ $item->id }}/edit" class="action_span"><img src="assets/img/edit.gif" class="pic" /></span></td>
			<td class="td{{ if_int($i) }}"><span id="get_Box:{{ $item->id }}/delete" class="action_span"><img src="assets/img/delete.gif" class="pic" /></span></td>
		</tr>
	  
		 <?php $i++ ?>					  
	@endforeach
	</table>

@else
	<p>keine Boxen vorhanden</p>
@endif

@if (!isset($menu_id))
	<?php $menu_id = Box::find($box_id)->menu->id ?>
@endif
<br /><span id="get_Box:{{ $menu_id }}/create" class="action_span">Neue Box hinzufügen</span><br />