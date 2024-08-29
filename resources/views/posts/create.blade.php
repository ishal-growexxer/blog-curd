@section('title', 'New Post')
@extends('layouts.layouts')

@section('content')

<h1 class="h3 mb-3 font-weight-normal">Create a new post</h1>

<form method="post" action="{{ route('posts.store') }}">
    @csrf
    @include('partials.errors')

    <div class="form-group">
        <label for="title">Title</label>
        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
            class="form-control"
            id="title"
            placeholder="Title"
            minlength="5"
            maxlength="100"
            required
        />
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea
            name="body"
            class="form-control"
            id="content"
            placeholder="Content"
            minlength="5"
            maxlength="2000"
            required
            rows="10"
        >{{ old('content') }}</textarea>
    </div>

    <button type="submit" class="btn btn-outline-primary">Publish</button>
</form>


@endsection