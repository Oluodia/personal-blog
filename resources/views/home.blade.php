@php
	use App\Models\Post;
	use App\Models\User;
	use Illuminate\Support\Str;
@endphp

<x-app-layout>
	<div class="grid grid-cols-1 md:grid-cols-1 gap-10">
		<!-- Post example -->
		<!-- <article class="bg-white rounded-lg shadow-md p-6 mb-8">
				<h2 class="text-xl font-bold text-indigo-600">Первый пост</h2>
				<p class="text-gray-600 mt-2"><span class="font-semibold">12 октября 2023</span> | <span>Автор</span>
				</p>
				<p class="mt-4">Это содержание моего первого поста. Здесь будет много интересного и полезного.</p>
				<a href="#" class="text-indigo-600 hover:underline mt-4 inline-block">Читать далее</a>
			</article> -->
		@foreach (Post::all() as $post)
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
</x-app-layout>