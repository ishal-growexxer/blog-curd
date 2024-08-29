<div class="content">
    <a href="{{ route('posts.show', [$post->slug]) }}">
      <h1 class="h2">{{ $post->title }}</h1>
    </a>
    <p><strong>Posted:</strong> {{ $post->created_at->diffForHumans() }}</p>
    <p><strong>Category:</strong> {{ $post->category }}</p>
    <p>{!! nl2br(e($post->body)) !!}</p>
  
    {{-- <form method="post" action="{{ route('posts.destroy', [$post->slug]) }}">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger">
          Delete
        </button>
    </div>
</form> --}}
    <div class="btn-group btn-group-sm" role="group" aria-label="Post actions">
        <a href="{{ route('posts.edit', [$post->slug]) }}" class="btn btn-info">
            Edit
        </a>
        <button class="btn-delete btn btn-danger" data-id="{{ $post->id }}">Delete</button>
    </div>
  </div>
  