<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.home'));
});

// Home > Posts
Breadcrumbs::for('admin.posts', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Posts', route('posts.index'));
});

// Home > Posts > create
Breadcrumbs::for('admin.posts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.posts');
    $trail->push('Create', route('posts.create'));
});


// Home > Posts > [edit]
Breadcrumbs::for('admin.posts.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('admin.posts');
    $trail->push($post->name, route('posts.edit', $post));
});


// Home > Categories
Breadcrumbs::for('admin.categories', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Categories', route('categories.index'));
});

// Home > Categories > create
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories');
    $trail->push('Create', route('categories.create'));
});


// Home > Categories > [edit]
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('admin.categories');
    $trail->push($category->name, route('categories.edit', $category));
});

// Home > Tags
Breadcrumbs::for('admin.tags', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Tags', route('tags.index'));
});

// Home > Tags > create
Breadcrumbs::for('admin.tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.tags');
    $trail->push('Create', route('tags.create'));
});


// Home > Tags > [edit]
Breadcrumbs::for('admin.tags.edit', function (BreadcrumbTrail $trail, Tag $tag) {
    $trail->parent('admin.tags');
    $trail->push($tag->name, route('tags.edit', $tag));
});
