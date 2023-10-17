<?php

namespace Adminetic\Newsletter\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Adminetic\Newsletter\Console\Commands\GenerateFakeSubscriberCommand;
use Adminetic\Newsletter\Http\Livewire\Admin\Subscriber\SubscriberPanel;
use Adminetic\Newsletter\Http\Livewire\Admin\Subscriber\SubscriberAction;

class NewsletterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Publish Ressource
        if ($this->app->runningInConsole()) {
            $this->publishResource();
        }
        // Register Resources
        $this->registerResource();
        // Register View Components
        $this->registerLivewireComponents();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Publish Package Resource.
     *
     * @return void
     */
    protected function publishResource()
    {
        // Publish Config File
        $this->publishes([
            __DIR__ . '/../../config/newsletter.php' => config_path('newsletter.php'),
        ], 'newsletter-config');
        // Publish View Files
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/adminetic/plugin/newsletter'),
        ], 'newsletter-views');
        // Publish Migration Files
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'newsletter-migrations');
    }

    /**
     * Register Package Resource.
     *
     * @return void
     */
    protected function registerResource()
    {
        if (!config('newsletter.publish_migrations', true)) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations'); // Loading Migration Files
        }
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'newsletter'); // Loading Views Files
    }

    /**
     * Register Package Command.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands([
            GenerateFakeSubscriberCommand::class
        ]);
    }


    /**
     * Register Components.
     *
     * @return void
     */
    protected function registerLivewireComponents()
    {
        Livewire::component('newsletter-subscriber-panel', SubscriberPanel::class);
        Livewire::component('newsletter-subscriber-action', SubscriberAction::class);
    }
}
