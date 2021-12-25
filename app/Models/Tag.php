<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * The posts that belong to the tag.
     */
    public function posts() {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
