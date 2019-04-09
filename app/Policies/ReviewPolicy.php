<?php

namespace App\Policies;

use \App\Models\Review;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
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
     * Determine whether the user can view the Review.
     *
     * @param  User $user
     * @param  Review $review
     * @return mixed
     */
    public function view(User $user, Review $review)
    {
        return true;
    }

    /**
     * Determine whether the user can create Review.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Review.
     *
     * @param User $user
     * @param  Review $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Review.
     *
     * @param User $user
     * @param  Review $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        return true;
    }

}
