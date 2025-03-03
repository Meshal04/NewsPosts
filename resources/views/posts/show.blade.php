<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>

    <p><strong>Content:</strong> {{ $post->content }}</p>
    <p><strong>Category ID:</strong> {{ $post->category_id }}</p>
    <p><strong>User ID:</strong> {{ $post->user_id }}</p>

    @if($post->image)
        <p><strong>Image:</strong></p>
        <img src="{{ asset('storage/' . $post->image) }}" width="300">
    @endif

    <br>
    <a href="{{ route('posts.index') }}">Back to Posts</a>
    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <hr>
    <h3>Comments</h3>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @auth
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <textarea name="content" rows="3" required></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit">Submit</button>
    </form>
    @endauth

    @foreach ($post->comments as $comment)
        <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
        @if(Auth::id() === $comment->user_id)
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
    @endforeach
</body>
</html>
