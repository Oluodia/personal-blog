@php
	use App\Models\Post;
	use Illuminate\Support\Str;
@endphp

<section>
	<header>
		<h2 class="text-lg font-medium text-purple-800">Удалить пост</h2>
	</header>

	<form method='post' action="{{ route('posts.destroy') }}" class="mt-6">
		@csrf
		@method('delete')

		<div class="mb-6">
			<label for="title-select" class="block text-sm font-medium text-gray-700 mb-2">Выберите заголовок</label>
			<select id="title-select" name='title'
				class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
				<option alue="" class="text-gray-400">--Пожалуйста, выберите опцию--</option>
				@foreach (Post::all() as $post)
					<option value="{{ $post->title }}">{{ Str::limit($post->title, 100) }}</option>
				@endforeach
			</select>
		</div>


		<!-- Кнопка Удалить -->
		<div class="mt-6">
			<button type="submit"
				class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
				Удалить
			</button>
		</div>
	</form>
</section>