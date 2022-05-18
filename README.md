# Rapidez Snowdog Menu

A Blade component will be registered which can be used:
```
<x-snowdog-menu identifier="main"/>
```

## Installation

If you didn't remove the default menu package yet:
```
composer remove rapidez/menu
```
Install this package:
```
composer require rapidez/snowdog-menu
```
And replace `<x-menu/>` with `<x-snowdog-menu identifier="main"/>` in the header Blade file (and replace the identifier):
```
resources/views/vendor/rapidez/layouts/partials/header.blade.php
```
If you haven't published the Rapidez views yet:
```
php artisan vendor:publish --provider="Rapidez\Core\RapidezServiceProvider" --tag=views
```

## Views

You can publish the views with: 
```
php artisan vendor:publish --provider="Rapidez\SnowdogMenu\SnowdogMenuServiceProvider" --tag=views
```

### Types

Currently there is only an anchor in the views as the category and custom url types are mostly used; but you can check the `$item->type` and do things conditionally with that, for example:
```
@if($item->type == 'cms_block')
    @content($item->content)
@endif
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
