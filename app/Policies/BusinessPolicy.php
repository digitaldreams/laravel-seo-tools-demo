<?php

namespace App\Policies;

use \App\Models\Business;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessPolicy
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
     * Determine whether the user can view the Business.
     *
     * @param  User $user
     * @param  Business $business
     * @return mixed
     */
    public function view(User $user, Business $business)
    {
        return true;
    }

    /**
     * Determine whether the user can create Business.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Business.
     *
     * @param User $user
     * @param  Business $business
     * @return mixed
     */
    public function update(User $user, Business $business)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Business.
     *
     * @param User $user
     * @param  Business $business
     * @return mixed
     */
    public function delete(User $user, Business $business)
    {
        return true;
    }

}
