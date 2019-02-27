<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    private $append_data = [];

    protected $availableIncludes=[
        'topics','roles'
    ];



    public function __construct(array $append_data=[])
    {
        $this->append_data = $append_data;
    }

    public function transform(User $user)
    {
        $return = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'introduction' => $user->introduction,
            'bound_phone' => $user->phone ? true : false,
            'bound_wechat' => ($user->weixin_unionid || $user->weixin_openid) ? true : false,
            'last_actived_at' => $user->last_actived_at->toDateTimeString(),
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
        ];
        return array_merge($return, $this->append_data);
    }

    public function includeTopics(User $user)
    {
        $topics = $user->topics;

        return $this->collection($topics, new TopicTransformer);
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

}