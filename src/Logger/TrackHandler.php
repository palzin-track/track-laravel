<?php

namespace Palzin\Track\Logger;

use Palzin\Track\Facades\Track;
use Illuminate\Support\Str;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

/**
 * The Monolog processing handler.
 */
class TrackHandler extends AbstractProcessingHandler
{

    /**
     * The channel.
     *
     * @var string
     */
    public string $channel;

    /**
     * Whether to send push notification.
     *
     * @var string
     */
    public string $notify;

    /**
     * Constructs a new monolog Track handler.
     *
     * @param string $channel
     * @param bool $notify
     * @param int $level
     */
    public function __construct(string $channel, bool $notify = false, int $level = Logger::DEBUG)
    {
        parent::__construct($level);

        $this->channel = $channel;
        $this->notify = $notify;
    }

    /**
     * Writes the record to the log.
     *
     * @param array $record
     */
    protected function write(array $record): void
    {
        Track::log($this->channel,
            event: $this->getEvent($record),
            icon: $this->getIcon($record),
            notify: $this->notify,
        );
    }

    /**
     * Gets the event for the record.
     *
     * @param array $record
     * @return string
     */
    public function getEvent(array $record): string
    {
        return "{$record['channel']}.{$record['level_name']}: {$record['message']}";
    }

    /**
     * Gets the description for the record.
     *
     * @param array $record
     * @return string
     */
    public function getDescription(array $record): string
    {
        return $record['context'];
    }

    /**
     * Gets the icon for the record.
     *
     * @param array $record
     * @return string|null
     */
    protected function getIcon(array $record): ?string
    {
        $icons = config('track.icons');

        return $icons[Str::upper($record['level_name'])] ?? null;
    }

}