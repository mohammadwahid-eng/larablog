@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.tags.edit', $tag) }}
@endsection

@section('content')
    edit
@endsection