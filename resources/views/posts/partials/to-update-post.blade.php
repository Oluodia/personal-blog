@php
	use App\Models\Post;
	use Illuminate\Support\Str;
@endphp

<section>
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
		<!-- Заголовок страницы -->
		<h1 class="text-lg font-medium text-purple-800">Редактирование поста</h1>

		<!-- Форма редактирования поста -->
		<div class="bg-white p-6 rounded-lg">
			<form method="get" action="{{ route('posts.showUpdate') }}">
				@csrf

				<!-- Выбор заголовка -->
				<div class="mb-6">
					<label for="title-select" class="block text-sm font-medium text-gray-700 mb-2">Выберите
						заголовок</label>
					<select id="title-select" name="title"
						class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
						<option value="" class="text-gray-400">--Пожалуйста, выберите опцию--</option>
						@foreach (Post::all() as $post)
							<option value="{{ $post->title }}">{{ Str::limit($post->title, 100) }}</option>
						@endforeach
					</select>
				</div>

				<!-- Кнопка "Изменить" -->
				<div class="flex justify-end">
					<button type="submit"
						class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
						Изменить
					</button>
				</div>
		</div>
		</form>
	</div>
</section>