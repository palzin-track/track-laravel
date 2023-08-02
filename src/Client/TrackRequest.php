<?php

namespace Palzin\Track\Client;

use Illuminate\Contracts\Support\Arrayable;

/**
 * A Track logging request.
 */
class TrackRequest implements Arrayable
{

    /**
     * Constructs a new Track request.
     *
     * @param string $project
     * @param string $channel
     * @param string $event
     * @param string|null $description
     * @param string|null $icon
     * @param bool $notify
     */
    public function __construct(
        public string $project,
        public string $channel,
        public string $event,
        public ?string $description,
        public ?string $icon,
        public bool $notify,
    ) {}

    /**
     * Gets the message as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }

}