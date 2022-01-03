@extends('layouts.app')

@section('title')
    {{ __('Edit') . ' ' . $post->name}}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.posts.edit', $post) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $post->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>
                        </div>        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control tinymce">{{ old('description', $post->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            @php
                                $postCats = $post->categories->pluck('id')->toArray()
                            @endphp

							<label for="categories">Categories</label>
							<select name="categories[]" id="categories" class="form-control" multiple>
								@foreach (\App\Models\Category::all() as $category)
									<option value="{{ $category->id }}" @if(in_array($category->id, $postCats)) selected @endif>{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="tags" class="w-100">Tags</label>
							<input type="text" class="form-control tagsinput" name="tags" value="{{ old('tags', $post->tags) }}">
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

@push('header')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
	<style>
		.bootstrap-tagsinput {
			width: 100%;
		}
	</style>
@endpush

@push('footer')
	<script src="https://cdn.tiny.cloud/1/gk11n0zqc28alzzyl11zjtzpif29wdeiw07mr7hmasbg0130/tinymce/5/tinymce.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea.tinymce'
		});
		
		$(".tagsinput").tagsinput({
			tagClass: function(item) {
				return 'badge badge-primary';
			}
		});		
	</script>
@endpush