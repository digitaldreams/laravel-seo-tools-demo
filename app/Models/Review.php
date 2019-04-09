<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property int $user_id user id
 * @property enum $status status
 * @property int $reviewable_id reviewable id
 * @property string $reviewable_type reviewable type
 * @property varchar $ip_address ip address
 * @property double $rating rating
 * @property varchar $reviews reviews
 * @property Business $business belongsTo
 * @property User $user belongsTo
 */
class Review extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_REJECTED = 'rejected';
    const STATUS_PROFANITY = 'profanity';

    /**
     * Database table name
     */
    protected $table = 'reviews';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'user_id',
        'status',
        'reviewable_id',
        'reviewable_type',
        'ip_address',
        'rating',
        'review'
    ];

    /**
     * business
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewable()
    {
        return $this->morphTo();
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
}