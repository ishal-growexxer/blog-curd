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
@auth
    <div class="btn-group btn-group-sm" role="group" aria-label="Post actions">
        <a href="{{ route('posts.edit', [$post->slug]) }}" class="btn btn-info">
            Edit
        </a>
        <button class="btn-delete btn btn-danger" data-id="{{ $post->id }}">Delete</button>
    </div>
</div>
<ul>
	@foreach($post->comments as $comment)
	  <li>
		<strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}
	  </li>
	@endforeach
  </ul>

<form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
	@csrf
	{{-- <div class="form-group">
	  <label for="author_name">Name:</label>
	  <input type="text" name="author_name" class="form-control" required>
	</div> --}}
	<div class="form-group">
	  <label for="content">Comment:</label>
	  <textarea name="body" class="form-control" rows="3" required></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endauth