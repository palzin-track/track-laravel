
# Palzin Track for Laravel


Get a realtime feed of your Laravel project’s most important events using [PalzinTrack](https://palzintrack.com/). Supports push notifications straight to your 
phone. 

**Get notified:**
1. In the [PalzinTrack dashboard](https://palzintrack.com/dashboard).
2. On your desktop/laptop (windows + macOS).
3. On your phone (android + iOS).

## Beta

PalzinTrack is currently in beta mode, and you must join the waitlist in order to use it. However, they accept people 
fairly quickly. Join on their website here: [https://palzintrack.com/](https://palzintrack.com/).

## Requirements

* PHP 8+
* Laravel 9

## Installation

You can install the package via composer:

```bash
composer require palzin-track/track-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="track-config"
```

This is the contents of the published config file:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Palzin Track.
    |--------------------------------------------------------------------------
    |
    | Configure the Palzin Track options.
    |
    */

    /**
     * The project name.
     */
    'project' => env('PALZIN_TRACK_PROJECT', 'laravel'),

    /**
     * The API token.
     */
    'token' => env('PALZIN_TRACK_TOKEN', ''),

    /**
     * A mapping of icons for logging.
     */
    'icons' => [
        'DEBUG'     => 'ℹ️',
        'INFO'      => 'ℹ️',
        'NOTICE'    => '📌',
        'WARNING'   => '⚠️',
        'ERROR'     => '⚠️',
        'CRITICAL'  => '🔥',
        'ALERT'     => '🔔️',
        'EMERGENCY' => '💀',
    ],

];
```

Add the Palzin Track channel to your logging config:

```php
'channels' => [
    //...
    'Track' => [
        'driver'  => 'custom',
        'via'     => Palzin\Track\Logger\TrackLogger::class,
        'level'   => 'debug',
        'project' => 'my-project',
        'channel' => 'my-channel',
        'notify'  => true,         
    ],
];
```

## Usage

Using logger:

```php
use Illuminate\Support\Facades\Log;
 
Log::channel('track')->emergency('There is an emergency! Please fix ASAP.');
```

Using facade:

```php
use Palzin\Track\Facades\Track;
 
Track::log('my-channel', 
    event: 'New subscriber!', 
    description: 'Someone just subscribed to MySaaS Pro at $9.99', 
    icon: '🤑', 
    notify: true,
);
```

Using client:

```php
use Palzin\Track\Client\TrackClient;

app(TrackClient::class)->log(new TrackRequest(
    project: 'project-name',
    channel: 'channel',
    event: 'Test event',
    description: 'This is a description for test event',
    icon: '😊',
    notify: true,
));
```

## Parameters

* **project:** The Palzin Track project name.
* **channel:** The channel to log in. Must be lowercase and hyphenated.
* **event:** The event name.
* **description:** The event description.
* **icon:** Associate the log with an icon (emoji).
* **notify:** Whether to send push notifications to devices.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Palzin](https://github.com/Palzin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
