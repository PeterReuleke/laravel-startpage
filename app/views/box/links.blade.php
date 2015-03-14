<div id="box{{ $item->id }}" class="box {{ $class }}" style="background-color: #{{ $item->color }};">
	<h3>{{ $item->name }}</h3>
	<ul>

	@if ($item->links()->count())
		@foreach ($item->links()->get() as $link)
			<li>{{ HTML::link($link->url, $link->name) }}</li>						
		@endforeach
	@else
		<li>keine Links vorhanden</li>
	@endif
	</ul>
</div>