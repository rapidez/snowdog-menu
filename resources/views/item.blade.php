<li class="{{ config('snowdogmenu.'.$identifier.'.'.$loop->depth.'.li') }}">
    @if($item->type == 'wrapper')
        <div class="{{ $item->classes }}">
    @else
        {{ $item->html($identifier, $loop) }}
    @endif
    @includeWhen($item->children->count(), 'snowdogmenu::menu', ['items' => $item->children])
    @if($item->type == 'wrapper')
        </div>
    @endif
</li>
