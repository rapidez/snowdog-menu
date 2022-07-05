<?php

namespace Rapidez\SnowdogMenu\ViewComponents;

use Illuminate\Support\Facades\Cache;
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

        $templateData = Cache::rememberForever('snowdogmenu.'.config('rapidez.store').'.'.$identifier, function () use ($identifier) {
            $menu = Menu::where('identifier', $identifier)->firstOrFail();

            $view = view('snowdogmenu::level1', [
                'items'      => $this->convertToMenuTree($menu->items),
                'identifier' => $identifier,
            ]);

            // Trick to view the protected "pushes" attribute.
            // If it has items in the stack, we must not cache
            // the rendered view as we'll lose our push stacks.
            $viewFactory = $view->getFactory();
            $pushes = (new \ReflectionClass($viewFactory))->getProperty('pushes');
            $pushes->setAccessible(true);

            if(count($pushes->getValue($viewFactory))) {
                return ['items' => $items];
            }

            // Immediately returning html is faster.
            // So return html if no stacks.
            return $view->render();
        });

        if (is_string($templateData)) {
            return $templateData;
        }

        return view('snowdogmenu::level1', [
            'items'      => $templateData['items'],
            'identifier' => $identifier,
        ]);
    }

    protected function convertToMenuTree($items, $parentId = null)
    {
        return $items->where('parent_id', $parentId)->map(function ($item) use ($items, $parentId) {
            $item['parent'] = $items->where('node_id', $parentId)->first();
            $item['children'] = $this->convertToMenuTree($items, $item->node_id);

            return $item;
        })->sortBy('position');
    }
}
