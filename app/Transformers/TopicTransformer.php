<?php

namespace App\Transformers;

use App\Models\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    private $append_data = [];

    public function __construct(array $append_data=[])
    {
        $this->append_data = $append_data;
    }

    public function transform(Topic $topic)
    {
        $return = [
            'id' => $topic->id,
            'title' => $topic->title,
        ];
        return array_merge($return, $this->append_data);
    }
}