@php
	use App\Models\Post;
	use Illuminate\Support\Str;

	$posts = Post::paginate(4);
@endphp

<x-app-layout>
	<div class="grid grid-cols-1 md:grid-cols-1 gap-10">
		@foreach ($posts as $post)
			<section class="bg-white rounded-lg shadow-md p-6 mb-8">
				<h2 class="text-xl font-bold text-indigo-600">{{ Str::limit($post->title, 50) }}</h2>

				<p class="text-gray-600 mt-2"><span class="font-semibold">{{ $post->created_at }}</span> |
					<span>{{ $post->author }}</span>
				</p>

				<p class="mt-4">{{ Str::limit($post->content, 100) }}</p>

				<a href="{{ route('posts.post', ['id' => $post->id]) }}"
					class="text-indigo-600 hover:underline mt-4 inline-block">Читать далее</a>
			</section>
		@endforeach
	</div>
	{{ $posts->links() }}
</x-app-layout>