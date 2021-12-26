@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.posts.edit', $post) }}
@endsection

@section('content')
    edit
@endsection