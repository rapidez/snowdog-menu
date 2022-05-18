<ul class="hidden absolute flex bg-white border p-3 z-10 group-hover:flex">
    @foreach ($items as $item)
        <li class="px-3">
            <a class="block text-primary font-bold border-b py-3 mb-3 {{ $item->classes }}" href="{{ $item->content }}">
                {{ $item->title }}
            </a>
            @includeWhen($item->children->count(), 'snowdogmenu::level3', ['items' => $item->children])
        </li>
    @endforeach
</ul>
