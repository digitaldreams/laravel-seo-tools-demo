<?php

namespace App\Policies;

use \App\Models\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        //return true if user has super power
    }

    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the Post.
     *
     * @param  User $user
     * @param  Post $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create Post.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Post.
     *
     * @param User $user
     * @param  Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Post.
     *
     * @param User $user
     * @param  Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return true;
    }

}
