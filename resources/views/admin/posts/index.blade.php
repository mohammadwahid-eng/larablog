	@extends('layouts.app')

	@section('title')
		{{ __('All Posts') }}
	@endsection

	@section('breadcrumbs')
		{{ Breadcrumbs::render('admin.posts') }}
	@endsection

	@section('content')
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">
							<a href="{{ route('posts.create') }}" class="btn btn-sm btn-dark">Add New Post</a>
						</h4>
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Image</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Categories</th>
										<th>Tags</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach (\App\Models\Post::all() as $post)
										<tr>
											<td>{{ $post->id }}</td>
											<td>
												@if($post->getFirstMedia())
													<img class="img-xs" src="{{ $post->getFirstMediaUrl() }}" alt="{{ $post->name }}">
												@else
													<img class="img-xs" src="http://placehold.it/50x50" alt="{{ $post->name }}">
												@endif
											</td>
											<td>{{ $post->name }}</td>
											<td>{{ $post->slug }}</td>
											<td>
												@foreach ($post->categories as $category)
													<span class="badge badge-sm badge-info">{{ $category->name }}</span>
												@endforeach
											</td>
											<td>
												@foreach ($post->tags as $tag)
													<span class="badge badge-sm badge-primary">{{ $tag->name }}</span>
												@endforeach
											</td>
											<td>
												<div class="btn-group">
													<a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary"><i class="icon-pencil"></i></a>
													<a href="{{ route('posts.destroy', $post) }}" class="btn btn-sm btn-danger btn-delete"><i class="icon-trash"></i></a>
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