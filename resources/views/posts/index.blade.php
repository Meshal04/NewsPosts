<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<div class="container mx-auto px-4">
<div class="mb-7 flex justify-center items-center text-center">
        <h2 class="text-5xl leading-normal font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-orange-500">
            NewsPost
        </h2>
    </div>

    <div class="text-center mb-6">
        <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Post
        </a>
    </div>

    <div class="container md:container-xl mx-auto p-3.5">
   

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 items-center gap-8">
        @foreach($posts as $post)
        <div class="cards-shadow border-2 border-transparent hover:border-yellow-600 rounded-lg hover:shadow-xl transition duration-300 ease-in-out">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full rounded-t-md">
            <div class="p-3">
                <div class="text-slate-600 text-sm font-normal pt-2">{{ $post->created_at->format('M, Y') }}</div>
                <h2 class="text-sky-800 text-lg font-semibold line-clamp-2 pt-2.5 h-[66px]">{{ $post->title }}</h2>
                <p class="text-slate-700 font-normal line-clamp-2 leading-6 pt-1 h-[52px]">{{ Str::limit($post->content, 100, '...') }}</p>
                <div class="text-right pt-1">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-yellow-600 text-sm font-semibold">Read More 
                        <i class="fa fa-arrow-right fa-beat" style="color: #d29d2c;"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

  
</div>
</div>

