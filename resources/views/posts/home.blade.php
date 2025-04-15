<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #ffffff;
            color: #2575fc;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #2575fc;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Welcome to NewsPosts</h1>
        <p>Your one-stop platform for the latest news and updates.</p>
        <div class="mt-4">
            <a href="{{ url('/dashboard') }}" class="btn btn-custom me-3">Go to Dashboard</a>
            <a href="{{ url('/posts') }}" class="btn btn-custom">View Posts</a>
        </div>
    </div>
</body>
</html></div></head>