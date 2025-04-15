<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
            color: #2c3e50;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin: 20px auto;
            max-width: 800px;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        .btn-secondary {
            background-color: #95a5a6;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="mb-4 text-center">Edit Post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
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

                <div class="mb-3">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content:</label>
                    <textarea class="form-control" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category:</label>
                    <input type="number" class="form-control" name="category_id" value="{{ old('category_id', $post->category_id) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">User:</label>
                    <input type="number" class="form-control" name="user_id" value="{{ old('user_id', $post->user_id) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image:</label>
                    @if($post->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail" width="150">
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="form-label">Change Image:</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Update Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
