<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * @property int $user_id user id
 * @property varchar $title title
 * @property varchar $slug slug
 * @property varchar $status status
 * @property longtext $body body
 * @property int $category_id category id
 * @property varchar $image image
 * @property datetime $published_at published at
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property BlogCategory $blogCategory belongsTo
 * @property User $user belongsTo
 * @property \Illuminate\Database\Eloquent\Collection $blogComment hasMany
 * @property \Illuminate\Database\Eloquent\Collection $tag belongsToMany
 */
class Post extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    /**
     * Database table name
     */
    protected $table = 'posts';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'status',
        'body',
        'category_id',
        'photo_id',
        'published_at',
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['published_at'];

    /**
     * blogCategory
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
     * blogComments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    /**
     * tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_post_tag');
    }


}