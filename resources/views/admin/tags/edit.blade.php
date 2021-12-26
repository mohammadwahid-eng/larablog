@extends('layouts.app')

@section('title')
    {{ __('Edit') . ' ' . $tag->name}}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.tags.edit', $tag) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tags.update', $tag) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tag->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $tag->slug) }}" required>
                        </div>        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ old('description', $tag->description) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection