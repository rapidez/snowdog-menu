@if($item->content)
    <a class="{{ config('snowdogmenu.'.$identifier.'.'.$loop->depth.'.category') }} {{ $item->classes }}" href="{{ $item->content }}">{{ $item->title }}</a>
@else
    <span class="{{ config('snowdogmenu.'.$identifier.'.'.$loop->depth.'.category') }} {{ $item->classes }}">{{ $item->title }}</span>
@endif
