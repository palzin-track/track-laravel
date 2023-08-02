<?php

namespace Palzin\Track;

use Palzin\Track\Client\TrackClient;
use Palzin\Track\Client\TrackRequest;

/**
 * The Track logger.
 */
class Track
{

    /**
     * The Track client.
     *
     * @var TrackClient
     */
    protected TrackClient $client;

    /**
     * Constructs a new Track.
     *
     * @param TrackClient $client
     */
    public function __construct(TrackClient $client)
    {
        $this->client = $client;
    }

    /**
     * Logs event to the provided channel.
     *
     * @param string $channel
     * @param string $event
     * @param string|null $description
     * @param string|null $icon
     * @param bool $notify
     */
    public function log(string $channel, string $event, string $description = null, string $icon = null, bool $notify = false): void
    {
        $this->client->log(new TrackRequest(
            project: config('track.project'),
            channel: $channel,
            event: $event,
            description: $description,
            icon: $icon,
            notify: $notify,
        ));
    }

}
