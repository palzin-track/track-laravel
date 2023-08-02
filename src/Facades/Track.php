<?php

namespace Palzin\Track\Facades;

use Illuminate\Support\Facades\Facade;
use RuntimeException;

/**
 * Facade for Track.
 *
 * @see \Palzin\Track\Track
 *
 * @method static void log(string $channel, string $event, string $description = null, string $icon = null, bool $notify = false)
 */
class Track extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return \Palzin\Track\Track::class;
    }

}
