<?php

namespace Palzin\Track\Logger;

use Illuminate\Support\Arr;
use Monolog\Logger;

/**
 * The Laravel Track logger.
 */
class TrackLogger
{

    /**
     * Creates a new Monologger with Track handler.
     *
     * @param array $config
     * @return Logger
     */
    public function __invoke(array $config): Logger
    {
        // Create handler.
        $handler = new TrackHandler(
            channel: $config['channel'],
            notify: $config['notify'] ?? false,
            level: Logger::toMonologLevel($config['level'] ?? 'debug'),
        );

        return new Logger('Track', Arr::wrap($handler));
    }

}