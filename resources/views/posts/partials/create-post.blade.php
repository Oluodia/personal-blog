<section>
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
		<!-- Заголовок страницы -->
		<h1 class="text-lg font-medium text-purple-800">Создание поста</h1>

		<!-- Форма создания поста -->
		<div class="bg-white p-6 rounded-lg">
			<form method="POST" action="{{ route('posts.create') }}">
				@csrf

				<!-- Поле "Заголовок" -->
				<div class="mb-6">
					<label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
					<input type="text" name="title" id="title" required
						class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
				</div>

				<!-- Поле "Содержание" -->
				<div class="mb-6">
					<label for="content" class="block text-sm font-medium text-gray-700">Содержание</label>
					<textarea name="content" id="content" rows="6" required
						class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
				</div>

				<!-- Кнопка "Создать пост" -->
				<div class="flex justify-end">
					<button type="submit"
						class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
						Создать пост
					</button>
				</div>
				@if (header('status'))
					<p class="text-sm text-green-600">Пост создан.</p>
				@endif
			</form>
		</div>
	</div>
</section>