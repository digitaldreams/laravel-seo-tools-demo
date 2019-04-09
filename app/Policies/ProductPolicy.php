<?php

namespace App\Policies;

use \App\Models\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
     * Determine whether the user can view the Product.
     *
     * @param  User $user
     * @param  Product $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        return true;
    }

    /**
     * Determine whether the user can create Product.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Product.
     *
     * @param User $user
     * @param  Product $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Product.
     *
     * @param User $user
     * @param  Product $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return true;
    }

}
