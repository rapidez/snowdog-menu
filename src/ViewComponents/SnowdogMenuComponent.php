<?php

namespace Rapidez\SnowdogMenu\ViewComponents;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use Rapidez\SnowdogMenu\Models\Menu;

class SnowdogMenuComponent extends Component
{
    public string $identifier;

    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function render(): string
    {
        $identifier = $this->identifier;

        return Cache::rememberForever('snowdogmenu.'.config('rapidez.store').'.'.$identifier, function () use ($identifier) {
            $menu = Menu::where('identifier', $identifier)->firstOrFail();
            $view = View::exists('snowdog-menu.'.$identifier.'.menu')
                ? 'snowdog-menu.'.$identifier.'.menu'
                : 'snowdogmenu::menu';

            return view($view, [
                'items' => $this->convertToMenuTree($menu->items),
                'identifier' => $identifier,
            ])->render();
        });
    }

    protected function convertToMenuTree($items, $parentId = null)
    {
        return $items->where('parent_id', $parentId)->map(function ($item) use ($items) {
            $item['children'] = $this->convertToMenuTree($items, $item->node_id);

            return $item;
        })->sortBy('position');
    }
}
