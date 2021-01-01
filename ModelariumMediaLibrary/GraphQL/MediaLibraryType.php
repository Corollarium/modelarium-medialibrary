<?php

namespace ModelariumMediaLibrary\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Model;
use Nuwave\Lighthouse\Execution\DataLoader\BatchLoader;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class MediaLibraryType
{
    /**
     * Resolve media library.
     *
     * @param Model          $model
     * @param array          $args
     * @param GraphQLContext $context
     * @param ResolveInfo    $info
     *
     * @return \GraphQL\Deferred
     */
    public function mediaBatchLoad(Model $model, array $args, GraphQLContext $context, ResolveInfo $info)
    {
        $dataloader = BatchLoader::instance(
            MediaBatchLoader::class,
            $info->path,
            [
                'builder'  => $model->query(),
                'relation' => 'events',
            ]
        );

        return $dataloader->load(
            $model->getKey(),
            ['parent' => $model]
        );
    }
}
