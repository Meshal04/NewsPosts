<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create a New Post</h1>

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

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}" required><br>

        <label>Content:</label>
        <textarea name="content" required>{{ old('content') }}</textarea><br>

        <label>Category:</label>
        <input type="number" name="category_id" value="{{ old('category_id') }}" required><br>

        <label>User:</label>
        <input type="number" name="user_id" value="{{ old('user_id') }}" required><br>

        <label>Image:</label>
        <input type="file" name="image"><br>

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
</body>
</html>
