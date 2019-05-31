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

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = str_slug($model->name);
            }
        });
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

    public function image()
    {
        return $this->belongsTo(Photo::class, 'image_id');
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function schemaJsonLd()
    {
        $parentcategory = $this->category->parent->title ?? '';
        $subCategory = $this->category->title;
        $data = [
            "@context" => "http://schema.org",
            "@type" => "Product",
            'name' => $this->name,
            'category' => $parentcategory . '/' . $subCategory
        ];
        if (!empty($this->model)) {
            $data['model'] = $this->model;
        }
        if (!empty($this->sku)) {
            $data['sku'] = $this->sku;
        }
        if (!empty($this->color)) {
            $data['color'] = $this->color;
        }
        if (!empty($this->description)) {
            $data['description'] = $this->description;
        }
        if (!empty($this->image)) {
            $data['image'] = $this->image->getThumbnail();
        }

        if ($this->reviews()->count() > 0) {
            $data['aggregateRating'] = [
                "@type" => "AggregateRating",
                'ratingValue' => $this->review,
                'reviewCount' => $this->reviews()->count(),
                'bestRating' => 5,
                'worstRating' => 1
            ];
        }
        return $data;
    }
}