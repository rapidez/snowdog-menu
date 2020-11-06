<li class="{{ config('snowdogmenu.classes.'.$loop->depth.'.li') }}">
    @if($item->type == 'wrapper')
        <div class="{{ $item->classes }}">
    @else
        {{ $item->html($loop) }}
    @endif
    @includeWhen($item->children->count(), 'snowdogmenu::menu', ['items' => $item->children])
    @if($item->type == 'wrapper')
        </div>
    @endif
</li>
