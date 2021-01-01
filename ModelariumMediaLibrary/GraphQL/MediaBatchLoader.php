<?php

namespace App\GraphQL;

use App\Models\Bottle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Nuwave\Lighthouse\Execution\DataLoader\BatchLoader;

class MediaBatchLoader extends BatchLoader
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var string
     */
    protected $relation;

    /**
     * @param Builder $builder
     * @param string  $relation
     */
    public function __construct(Builder $builder, string $relation)
    {
        $this->builder = $builder;
        $this->relation = $relation;
    }

    /**
     * Resolve the keys.
     *
     * The result has to be a map: [key => result]
     */
    public function resolve(): array
    {
        $models = collect(Arr::pluck($this->keys, 'parent'));
        // TODO
        return [];
    }
}
