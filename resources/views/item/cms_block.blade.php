<div class="{{ config('snowdogmenu.'.$identifier.'.'.$loop->depth.'.cms_block') }} {{ $item->classes }}">
    @content($item->content)
</div>
