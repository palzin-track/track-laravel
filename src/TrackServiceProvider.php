<?php

namespace Palzin\Track;

use Palzin\Track\Client\TrackClient;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * The Track service provider.
 */
class TrackServiceProvider extends PackageServiceProvider
{

    /**
     * Configures the package.
     *
     * @param Package $package
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('track-laravel')
            ->hasConfigFile();

        $this->registerContainerBindings();
    }

    /**
     * Registers the container bindings.
     */
    protected function registerContainerBindings(): void
    {
        // Create client.
        $client = new TrackClient(config('track.token', ''));

        // Bind to container.
        $this->app->instance(Track::class, new Track($client));
        $this->app->instance(TrackClient::class, $client);
    }

}
