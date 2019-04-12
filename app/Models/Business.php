<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Str;

/**
 * @property varchar $name name
 * @property varchar $slug slug
 * @property int $logo_id logo id
 * @property int $address_id address id
 * @property longtext $description description
 * @property varchar $general_phone general phone
 * @property varchar $business_phone business phone
 * @property varchar $social_media_links social media links
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property varchar $email email
 * @property tinyint $rating rating
 * @property enum $status status
 * @property int $user_id user id
 * @property varchar $weblink weblink
 * @property tinyint $verified verified
 * @property varchar $verification_code verification code
 * @property varchar $video_link video link
 * @property int $added_by added by
 * @property json $dirties dirties
 * @property User $user belongsTo
 * @property \Illuminate\Database\Eloquent\Collection $photo belongsToMany
 * @property \Illuminate\Database\Eloquent\Collection $businessReview hasMany
 */
class Business extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_REJECTED = 'rejected';
    const STATUS_PROFANITY = 'profanity';

    /**
     * Database table name
     */
    protected $table = 'businesses';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'name',
        'slug',
        'logo_id',
        'address_id',
        'description',
        'general_phone',
        'business_phone',
        'social_media_links',
        'email',
        'rating',
        'status',
        'user_id',
        'weblink',
        'video_link',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
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

    public function logo()
    {
        return $this->belongsTo(Photo::class, 'logo_id');
    }

    public function address()
    {
        return $this->belongsTo(Location::class, 'address_id');
    }

    /**
     * photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'business_photo');
    }

    /**
     * businessReviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}