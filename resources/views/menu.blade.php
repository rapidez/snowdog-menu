<ul class="{{ config('snowdogmenu.'.$identifier.'.'.(isset($loop->depth) ? $loop->depth + 1 : 1).'.ul') }}">
    @foreach ($items as $item)
        @include('snowdogmenu::item')
    @endforeach
</ul>
