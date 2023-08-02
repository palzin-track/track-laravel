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
