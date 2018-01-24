<?php

namespace App\Transformers;

use App\User;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform(User $users)
    {
        return [

            'id' => $users->id,
            'username' => $users->username,
            'email_id' => $users->email_id,
            'password' => $users->password,
            'remember_token' => $users->remember_token,
            'status' => $users->status,
            'created_at' => $users->created_at->format('d M Y'),
            'updated_at' => $users->updated_at->format('d M Y'),

			
        ];
    }
}
