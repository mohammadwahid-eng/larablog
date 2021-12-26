	@extends('layouts.app')

	@section('title')
		{{ __('All Tags') }}
	@endsection

	@section('breadcrumbs')
		{{ Breadcrumbs::render('admin.tags') }}
	@endsection

	@section('content')
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							<a href="{{ route('tags.create') }}" class="btn btn-sm btn-dark">Add New Tag</a>
						</h4>
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Description</th>
										<th>Posts</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach (\App\Models\Tag::all() as $tag)
										<tr>
											<td>{{ $tag->id }}</td>
											<td>{{ $tag->name }}</td>
											<td>{{ $tag->slug }}</td>
											<td>{{ $tag->description }}</td>
											<td>{{ count($tag->posts) }}</td>
											<td>
												<div class="btn-group">
													<a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
													<a href="{{ route('tags.destroy', $tag) }}" class="btn btn-sm btn-danger btn-delete"><i class="icon-trash"></i></a>
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