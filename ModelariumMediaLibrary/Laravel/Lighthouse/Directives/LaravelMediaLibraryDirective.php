<?php declare(strict_types=1);

namespace ModelariumMediaLibrary\Laravel\Lighthouse\Directives;

use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Support\Contracts\DefinedDirective;

class LaravelMediaLibraryDirective extends BaseDirective implements DefinedDirective
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'SDL'
"""
The conversion type
"""
type LaravelMediaLibraryConversion {
    """
    The media conversion name.
    """
    name: String!

    """
    Apply this width.
    """
    width: Int

    """
    Apply this height.
    """
    height: Int

    """
    Sharpen image.
    """
    sharpen: Int
    
    """
    If true, runs withResponsiveImages().
    """
    responsive: Boolean
}

"""
Implement the Laravel Media Library attributes on a model
"""
directive @laravelMediaLibrary (
    """
    The collection name to use
    """
    collection: String

    """
    The list of fields to compose in the index
    """
    fields: [String!]

    """
    Declare it as as single file collection.
    """
    singleFile: Boolean

    """
    Declare conversions
    """
    conversion: [LaravelMediaLibraryConversion!]
) on FIELD_DEFINITION

        
SDL;
    }
}
