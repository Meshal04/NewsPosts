<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .post-form-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 40px auto;
        }
        .page-title {
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #3498db;
            color: white;
            padding: 10px 30px;
            border-radius: 25px;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="post-form-container">
            <h1 class="page-title">Create A New Post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong><i class="fas fa-exclamation-circle"></i> Whoops! Something went wrong.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Content</label>
                    <textarea class="form-control" name="content" rows="6" required>{{ old('content') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <input type="number" class="form-control" name="category_id" value="{{ old('category_id') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">User</label>
                            <input type="number" class="form-control" name="user_id" value="{{ old('user_id') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Posts
                    </a>
                    <button type="submit" class="btn btn-custom">
                        <i class="fas fa-paper-plane"></i> Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html></div>
