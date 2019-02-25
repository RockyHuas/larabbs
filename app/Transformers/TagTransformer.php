<?php

namespace App\Transformers;

use App\Models\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'children'
    ];

    public function transform(Tag $tag)
    {
        return [
            'id' => $tag->id,
            'name' => $tag->name,
            'parent_id' => $tag->email
        ];

    }

    public function includeChildren(Tag $tag)
    {
        return $this->collection($tag->children, new self());
    }

}