<?php declare(strict_types=1);

namespace ModelariumMediaLibrary\Laravel\Lighthouse\Directives;

use Nuwave\Lighthouse\Schema\Directives\BaseDirective;

class LaravelMediaLibraryDirective extends BaseDirective
{
    public static function definition(): string
    {
        return file_get_contents('../../graphql/modelariumMediaLibrary.graphql');
    }
}
