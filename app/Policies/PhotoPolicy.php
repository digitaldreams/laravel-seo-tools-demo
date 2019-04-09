<?php

namespace App\Policies;

use \App\Models\Photo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
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
     * Determine whether the user can view the Photo.
     *
     * @param  User $user
     * @param  Photo $photo
     * @return mixed
     */
    public function view(User $user, Photo $photo)
    {
        return true;
    }

    /**
     * Determine whether the user can create Photo.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Photo.
     *
     * @param User $user
     * @param  Photo $photo
     * @return mixed
     */
    public function update(User $user, Photo $photo)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Photo.
     *
     * @param User $user
     * @param  Photo $photo
     * @return mixed
     */
    public function delete(User $user, Photo $photo)
    {
        return true;
    }

}
