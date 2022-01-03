@extends('layouts.app')

@section('title')
	{{ __('Add new post') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.posts.create') }}
@endsection

@section('content')
	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<form action="{{ route('posts.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
						</div>
						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
						</div>        
						<div class="form-group">
							<textarea name="description" class="form-control tinymce">{{ old('description') }}</textarea>
						</div>
						<div class="form-group">
							<label for="categories">Categories</label>
							<select name="categories[]" id="categories" class="form-control" multiple>
								@foreach (\App\Models\Category::all() as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="tags" class="w-100">Tags</label>
							<select class="form-control tagsinput" name="tags" id="tags" multiple>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<input type="file" name="image" id="image" class="form-control">
						</div>
						<button type="submit" class="btn btn-dark">Create</button>
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