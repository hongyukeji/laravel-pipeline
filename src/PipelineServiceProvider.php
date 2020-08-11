<?php

namespace Hongyukeji\LaravelPipeline;

use Illuminate\Support\ServiceProvider;

class PipelineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/pipeline.php' => config_path('pipeline.php'),
        ], 'pipeline_config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/pipeline.php', 'pipeline'
        );

        $this->app->singleton(Pipeline::class, function ($app) {
            return new Pipeline($app->config->get('pipeline'));
        });

        $this->app->alias(Pipeline::class, 'pipeline');
    }
}
