# A short description of the tile

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonlynch/laravel-dashboard-uk-tide-tile.svg?style=flat-square)](https://packagist.org/packages/jonlynch/laravel-dashboard-uk-tide-tile)
[![Total Downloads](https://img.shields.io/packagist/dt/jonlynch/laravel-dashboard-uk-tide-tile.svg?style=flat-square)](https://packagist.org/packages/jonlynch/laravel-dashboard-uk-tide-tile)

A package to show UK tide information on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

## Installation

You can install the package via composer:

```bash
$ composer require jonlynch/laravel-dashboard-uk-weather-tile
```

## Usage

In your dashboard view you use the `livewire:uk-tide-tile` component. You may add more than one weather forecast by adding more locations.

```html
<x-dashboard>
    <livewire:uk-tide-tile position="a1"/>
</x-dashboard>
```

Add the config to the tiles sections of your `config/dashboard.php`

```php
// in config/dashboard.php

return [
    // ...
    tiles => [
         'tides' => [
            'api_key' => env ('TIDE_API_KEY'),
            'station_id' => '0435',
            'location' => 'St Bees'
        ],
    ]
```

In app\Console\Kernel.php you should schedule the JonLynch\UkWeatherTile\Commands\FetchMetOfficeDataCommand to run every 30 minutes.

``` php
// in app\Console\Kernel.php

protected function schedule(Schedule $schedule)
{
    $schedule->command(\JonLynch\TideTile\Commands\FetchTidesDataCommand::class)->hourly();
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [Jon Lynch](https://github.com/jonlynch) instead of using the issue tracker.

## Credits

- [Jon Lynch](https://github.com/jonlynch)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
