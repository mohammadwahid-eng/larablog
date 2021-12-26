@extends('layouts.app')

@section('title')
	{{ __('Add new tag') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.tags.create') }}
@endsection

@section('content')
	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<form action="{{ route('tags.store') }}" method="POST" class="forms-sample">
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
							<label for="description">Description</label>
							<textarea name="description" class="form-control">{{ old('description') }}</textarea>
						</div>
						<button type="submit" class="btn btn-dark">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection