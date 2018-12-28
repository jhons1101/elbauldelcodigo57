<?php

namespace elbauldelcodigo\Policies;

use elbauldelcodigo\User;
use elbauldelcodigo\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Se genera una policita de control para que sólo los usuarios que escribieron el post
     * pueden editarlo
     */

     public function pass (User $user, Post $post)
     {
        return $user->id == $post->post_usu;
     }
}
