@if($item->content)
    <a class="{{ config('snowdogmenu.classes.'.$loop->depth.'.category') }} {{ $item->classes }}" href="{{ $item->content }}">{{ $item->title }}</a>
@else
    <span class="{{ config('snowdogmenu.classes.'.$loop->depth.'.category') }} {{ $item->classes }}">{{ $item->title }}</span>
@endif
