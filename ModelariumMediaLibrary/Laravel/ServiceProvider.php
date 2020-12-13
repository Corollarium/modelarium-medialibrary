<?php declare(strict_types=1);

namespace ModelariumMediaLibrary\Laravel;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Nuwave\Lighthouse\Events\RegisterDirectiveNamespaces;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/graphql/schema.graphql' => base_path('graphql/modelariumMediaLibrary.graphql'),
        ], 'schema');

        
        Event::listen(
            RegisterDirectiveNamespaces::class,
            function (RegisterDirectiveNamespaces $registerDirectiveNamespaces): string {
                return 'Modelarium\\Laravel\\Lighthouse\\Directives';
            }
        );
        Event::listen(
            RegisterDirectiveNamespaces::class,
            function (RegisterDirectiveNamespaces $registerDirectiveNamespaces): string {
                return 'App\\Datatypes\\Types';
            }
        );
    }
}
