	@extends('layouts.app')

	@section('title')
		{{ __('All Categories') }}
	@endsection

	@section('breadcrumbs')
		{{ Breadcrumbs::render('admin.categories') }}
	@endsection

	@section('content')
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							<a href="{{ route('categories.create') }}" class="btn btn-sm btn-dark">Add New Category</a>
						</h4>
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Image</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Description</th>
										<th>Posts</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach (\App\Models\Category::all() as $category)
										<tr>
											<td>{{ $category->id }}</td>
											<td>
												@if($category->getFirstMedia())
													<img class="img-xs" src="{{ $category->getFirstMediaUrl() }}" alt="{{ $category->name }}">
												@else
													<img class="img-xs" src="http://placehold.it/50x50" alt="{{ $category->name }}">
												@endif
											</td>
											<td>{{ $category->name }}</td>
											<td>{{ $category->slug }}</td>
											<td>{{ $category->description }}</td>
											<td>{{ count($category->posts) }}</td>
											<td>
												<div class="btn-group">
													<a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
													<a href="{{ route('categories.destroy', $category) }}" class="btn btn-sm btn-danger btn-delete"><i class="icon-trash"></i></a>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<form method="POST" class="d-none delete-form">
			@method('DELETE')
			@csrf
		</form>
	@endsection

	@push('footer')
		<script>
			$(document).ready(function() {
				$('.btn-delete').click(function(e) {
					e.preventDefault();
					$('.delete-form').attr('action', $(this).attr('href')).submit();
				});
			});
		</script>
	@endpush