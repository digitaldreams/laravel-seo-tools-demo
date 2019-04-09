<?php

namespace App\Policies;

use \App\Models\Tag;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
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
     * Determine whether the user can view the Tag.
     *
     * @param  User $user
     * @param  Tag $tag
     * @return mixed
     */
    public function view(User $user, Tag $tag)
    {
        return true;
    }

    /**
     * Determine whether the user can create Tag.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Tag.
     *
     * @param User $user
     * @param  Tag $tag
     * @return mixed
     */
    public function update(User $user, Tag $tag)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Tag.
     *
     * @param User $user
     * @param  Tag $tag
     * @return mixed
     */
    public function delete(User $user, Tag $tag)
    {
        return true;
    }

}
