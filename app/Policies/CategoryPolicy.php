<?php

namespace App\Policies;

use \App\Models\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * Determine whether the user can view the Category.
     *
     * @param  User $user
     * @param  Category $category
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can create Category.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Category.
     *
     * @param User $user
     * @param  Category $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Category.
     *
     * @param User $user
     * @param  Category $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return true;
    }

}
