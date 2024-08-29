@section('title', 'Edit Post')
@section('action', route('posts.create'))
@extends('layouts.layouts')

@section('content')

<h1 class="title">Edit: {{ $post->title }}</h1>

<form method="post" action="{{ route('posts.update', [$post->slug]) }}">

    @csrf
    @method('patch')
    @include('partials.errors')

    <div class="form-group">
        <label for="title">Title</label>
        <input
            type="text"
            name="title"
            value="{{ old('title') ?? $post->title }}"
            class="form-control"
            id="title"
            placeholder="Title"
            minlength="5"
            maxlength="100"
            required
        />
    </div>

    <div class="form-group">
        <label for="content">Body</label>
        <textarea
            name="body"
            class="form-control"
            id="content"
            placeholder="Content"
            minlength="5"
            maxlength="2000"
            required
            rows="10"
        >{{ old('body') ?? $post->body }}</textarea>
    </div>


    <button type="submit" class="btn btn-primary btn-">Update</button>
    {{-- <div class="field">
        <div class="control">
        </div>
    </div> --}}

</form>

@endsection