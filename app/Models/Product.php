<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * @property int $user_id user id
 * @property int $category_id category id
 * @property int $sub_category_id sub category id
 * @property varchar $name name
 * @property varchar $slug slug
 * @property double $review review
 * @property int $image_id image id
 * @property enum $status status
 * @property text $description description
 * @property double $price price
 * @property varchar $brand brand
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property varchar $model model
 * @property varchar $weblink weblink
 * @property varchar $color color
 * @property varchar $size size
 * @property varchar $sku sku
 * @property varchar $details_url details url
 * @property Category $productCategory belongsTo
 * @property User $user belongsTo
 * @property \Illuminate\Database\Eloquent\Collection $photo belongsToMany
 * @property \Illuminate\Database\Eloquent\Collection $productReview hasMany
 */
class Product extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_PROFANITY = 'profanity';

    /**
     * Database table name
     */
    protected $table = 'products';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'review',
        'image_id',
        'status',
        'description',
        'price',
        'brand',
        'model',
        'color',
        'size',
        'sku',
    ];

    /**
     * productCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    /**
     * productCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'product_photo');
    }

    /**
     * productReviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }


}