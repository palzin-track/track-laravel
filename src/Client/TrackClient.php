<?php

namespace Palzin\Track\Client;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * The client for logging with Track.
 *
 */
class TrackClient
{

    /**
     * The base URL.
     *
     * @var string
     */
    protected string $url = 'https://api.palzintrack.com/v1/';

    /**
     * The API token.
     *
     * @var string
     */
    protected string $token;

    /**
     * Constructs a new Track.
     *
     * @var string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Builds a request.
     *
     * @return PendingRequest
     */
    protected function buildRequest(): PendingRequest
    {
        return Http::baseUrl($this->url)->withToken($this->token)->asJson();
    }

    /**
     * Logs something.
     *
     * @param TrackRequest $request
     * @return Response
     */
    public function log(TrackRequest $request): Response
    {
        return $this->buildRequest()->post('/log', $request->toArray());
    }

}