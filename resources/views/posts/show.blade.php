<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }
        .post-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .post-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }
        .btn-custom {
            margin: 0.5rem;
            transition: all 0.3s ease;
        }
        .comments-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #dee2e6;
        }
        .comment {
            background-color: #f8f9fa;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        .comment-form {
            margin: 2rem 0;
        }
    </style>
</head>
<body>
    <div class="post-container">
        <h1 class="mb-4">{{ $post->title }}</h1>

        <div class="mb-4">
            <p class="lead">{{ $post->content }}</p>
            <small class="text-muted">
                Category ID: {{ $post->category_id }} | Posted by User ID: {{ $post->user_id }}
            </small>
        </div>

        @if($post->image)
            <div class="text-center">
                <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Post image">
            </div>
        @endif

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-custom">
                <i class="fas fa-arrow-left"></i> Back to Posts
            </a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-custom">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-custom" 
                        onclick="return confirm('Are you sure you want to delete this post?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>

        <div class="comments-section">
            <h3>Comments</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @auth
            <div class="comment-form">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="content" class="form-control" rows="3" 
                                placeholder="Write your comment..." required></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </form>
            </div>
            @endauth

            @foreach ($post->comments as $comment)
                <div class="comment">
                    <strong>{{ $comment->user->name }}</strong>
                    <p class="mb-2">{{ $comment->content }}</p>
                    @if(Auth::id() === $comment->user_id)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</head>
</body>
</html>
