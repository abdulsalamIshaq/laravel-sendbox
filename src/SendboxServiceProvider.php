<?php

namespace AbdulsalamIshaq\Sendbox;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AbdulsalamIshaq\Sendbox\Commands\SendboxCommand;
use AbdulsalamIshaq\Sendbox\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;

class SendboxServiceProvider extends PackageServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function packageRegistered(): void
    {
        $this->app->singleton(Client::class, function (Application $app) {
            return new Client(Config::get('sendbox.access_token'), [
                'app_id' => Config::get('sendbox.app_id'),
                'client_secret' => Config::get('sendbox.client_secret'),
                'refresh_token' => Config::get('sendbox.refresh_token'),
            ]);
        });

        $this->app->singleton(Sendbox::class, function (Application $app) {
            return new Sendbox($app->make(Client::class));
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-sendbox')
            ->hasConfigFile()
            ->hasCommand(SendboxCommand::class);
    }

    /**
     * Boot the provider
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/sendbox.php' => App::configPath('sendbox.php')

        ], 'sendbox.config');
    }
}
