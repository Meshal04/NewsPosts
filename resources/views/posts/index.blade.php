<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold my-6 text-center">Posts</h1>

    <div class="text-center mb-6">
        <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Post
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($posts as $post)
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                <p class="text-gray-700 text-base">
                    {{ Str::limit($post->content, 100) }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <a href="{{ route('posts.show', $post) }}" class="inline-block bg-blue-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">
                    View
                </a>
                <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-green-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">
                    Edit
                </a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline-block">
                    @csrf @method('DELETE')
                    <button type="submit" class="inline-block bg-red-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

