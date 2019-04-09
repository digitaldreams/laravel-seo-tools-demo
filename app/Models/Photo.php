<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id user id
 * @property varchar $caption caption
 * @property varchar $title title
 * @property varchar $mime_type mime type
 * @property varchar $src src
 * @property int $location_id location id
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property Location $photoLocation belongsTo
 */
class Photo extends Model
{

    /**
     * Database table name
     */
    protected $table = 'photos';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'user_id',
        'caption',
        'title',
        'src',
        'location_id',
    ];

    /**
     * photoLocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}