<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
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
        'user_id',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * The categories that belong to the post.
     */
    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    /**
     * The tags that belong to the post.
     */
    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    
    /**
     * Get the author that owns the post.
     */
    public function author() {
        return $this->belongsTo(User::class);
    }
}
