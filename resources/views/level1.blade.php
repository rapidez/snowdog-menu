<ul class="flex flex-wrap">
    @foreach ($items as $item)
        <li class="group">
            <a class="block p-3 text-primary font-bold {{ $item->classes }}" href="{{ $item->content }}">
                {{ $item->title }}
            </a>
            @includeWhen($item->children->count(), 'snowdogmenu::level2', ['items' => $item->children])
        </li>
    @endforeach
</ul>
