@if (count($rss_items))
	@foreach ($rss_items as $t)
		<a href="{{ $t['href'] }}"><b>{{ $t['title0'] }}</b>: {{ $t['title1'] }}</a><br />
	@endforeach
@else
	<p>RSS-Feed nicht gefunden</p>
@endif