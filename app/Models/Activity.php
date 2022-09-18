<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the images for the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ActivityImage::class, 'activity_id', 'id');
    }

    public function excerp()
    {
        return Str::limit($this->description, 20, '...');
    }
}
