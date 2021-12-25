<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
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
        'parent_id',
        'description',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the children for the category
     */
    public function children() {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    /**
     * Get the parent that owns the children.
     */
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * The posts that belong to the category.
     */
    public function posts() {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
