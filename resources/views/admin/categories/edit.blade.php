@extends('layouts.app')

@section('title')
    {{ __('Edit') . ' ' . $category->name}}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.categories.edit', $category) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $category->slug) }}" required>
                        </div>        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
                        </div> 
                        <div class="form-group">
							<label for="parent_id">Parent</label>
							<select name="parent_id" id="parent_id" class="form-control">
								<option value="">None</option>
								@foreach (\App\Models\Category::where('id', '<>', $category->id)->get() as $cat)
									<option value="{{ $cat->id }}" @if(old('parent_id', $category->parent_id) == $cat->id) selected @endif>{{ $cat->name }}</option>
								@endforeach
							</select>
						</div>
                        <div class="form-group">
							<label for="image">Image</label>
							<input type="file" name="image" id="image" class="form-control">
						</div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection