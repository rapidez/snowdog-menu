<ul class="{{ config('snowdogmenu.classes.'.(isset($loop->depth) ? $loop->depth + 1 : 1).'.ul') }}">
    @foreach ($items as $item)
        @include('snowdogmenu::item')
    @endforeach
</ul>
