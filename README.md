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

## Configuration

You can change the classes with the configuration file by publishing it with:
```
php artisan vendor:publish --provider="Rapidez\SnowdogMenu\SnowdogMenuServiceProvider" --tag=config
```
The first key is the identifier so you can have different styling per menu. Keep in mind that if you're using TailwindCSS or running CSS purging with your own stack that the classes in this config file should be discoverable. So add it to the list of files!

## Views

If you need more control you can publish the views as well with: 
```
php artisan vendor:publish --provider="Rapidez\SnowdogMenu\SnowdogMenuServiceProvider" --tag=views
```

## Full control

Sometimes you have multiple menu's which need a different structure. In that case you can create a view in your project with this path: `resources/views/snowdog-menu/identifier/menu.blade.php` and include subviews with that same path from there.

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
