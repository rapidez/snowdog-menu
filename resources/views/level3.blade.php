<ul class="text-sm">
    @foreach ($items as $item)
        <li>
            <a class="inline-block py-1 hover:text-primary {{ $item->classes }}" href="{{ url($item->content) }}">
                {{ $item->title }}
            </a>
        </li>
    @endforeach
</ul>
