<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div>
            <strong>Whoops! Something went wrong.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required><br>

        <label>Content:</label>
        <textarea name="content" required>{{ old('content', $post->content) }}</textarea><br>

        <label>Category:</label>
        <input type="number" name="category_id" value="{{ old('category_id', $post->category_id) }}" required><br>

        <label>User:</label>
        <input type="number" name="user_id" value="{{ old('user_id', $post->user_id) }}" required><br>

        <label>Current Image:</label><br>
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" width="150"><br>
        @endif

        <label>Change Image:</label>
        <input type="file" name="image"><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
</body>
</html>
