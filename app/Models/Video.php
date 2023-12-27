<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'original_name',
        'disk',
        'path',
        'converted_for_downloading_at',
        'converted_for_streaming_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'converted_for_downloading_at',
        'converted_for_streaming_at',
        'created_at',
        'updated_at',
    ];

    // Add any relationships, additional methods, or other configurations as needed
}