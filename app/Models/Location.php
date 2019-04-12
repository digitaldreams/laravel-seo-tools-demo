<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $latitude latitude
 * @property varchar $longitude longitude
 * @property varchar $name name
 * @property varchar $street street
 * @property varchar $postcode postcode
 * @property varchar $suburb suburb
 * @property varchar $state state
 * @property varchar $country country
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 */
class Location extends Model
{

    /**
     * Database table name
     */
    protected $table = 'locations';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'latitude',
        'longitude',
        'name',
        'street',
        'postcode',
        'suburb',
        'state',
        'country'
    ];

    public function getFullAddress()
    {
        return $this->street;
    }
}