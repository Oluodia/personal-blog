<x-app-layout>
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

		<h1 class="text-lg font-medium text-purple-800">Редактирование поста</h1>

		<div class="bg-white p-6 rounded-lg">
			<form method="post" action="{{ route('posts.update') }}">
				@csrf
				@method('patch')
				<input type="text" hidden name='_id' value='{{ $post->id }}'>

				<!-- Заголовок -->
				<div class="mb-6">
					<label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
					<input type="text" name="title" id="title" value='{{ $post->title }}'
						class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
				</div>

				<!-- Содержание -->
				<div class="mb-6">
					<label for="content" class="block text-sm font-medium text-gray-700">Содержание</label>
					<textarea name="content" id="content" rows="6"
						class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
{{ $post->content }}
					</textarea>
				</div>

				<div class="flex justify-end">
					<button type="submit"
						class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
						Изменить
					</button>
				</div>
		</div>

		@if (session('status'))
			<p class="text-sm text-green-600">Пост изменен.</p>
		@endif
		</form>
	</div>
</x-app-layout>