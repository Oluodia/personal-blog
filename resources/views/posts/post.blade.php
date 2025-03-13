<x-app-layout>
	<div class="max-w-4xl mx-auto px-4 py-8">
		<!-- Заголовок поста -->
		<h2 class="text-3xl font-bold text-indigo-600 mb-4">{{ $post->title }}</h2>

		<!-- Мета-информация о посте -->
		<div class="text-gray-600 mb-6">
			<span class="font-semibold">{{ $post->created_at->format('d M Y, H:i') }}</span> |
			<span class="italic">{{ $post->author }}</span>
		</div>

		<!-- Контент поста -->
		<div class="prose max-w-none mb-8">
			{!! nl2br(e($post->content)) !!}
		</div>

		<!-- Раздел комментариев -->
		<div class="mt-8">
			<h3 class="text-2xl font-bold text-indigo-600 mb-4">Комментарии</h3>

			<!-- Форма для добавления комментария -->
			<form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-8">
				@csrf
				<input type="text" hidden name='_id' value='{{ $post->id }}'>
				<!-- Поле "Имя" -->
				<div class="mb-4">
					<input type="text" name="name" placeholder="Ваше имя"
						class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-600" required>
				</div>
				<!-- Поле "Комментарий" -->
				<div class="mb-4">
					<textarea name="content" rows="4"
						class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-600"
						placeholder="Напишите ваш комментарий..." required></textarea>
				</div>
				<!-- Кнопка отправки -->
				<button type="submit"
					class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
					Отправить
				</button>
			</form>

			<!-- Список комментариев -->
			<div class="space-y-4">
				@foreach($post->comments as $comment)
					<div class="p-4 bg-gray-50 rounded-lg shadow-sm">
						<div class="flex justify-between items-center mb-2">
							<span class="font-semibold text-indigo-600">{{ $comment->name }}</span>
							<span class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</span>
						</div>
						<p class="text-gray-700">{{ $comment->comment }}</p>
						@auth
							<!-- Кнопка удаления -->
							<form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
								onsubmit="return confirm('Вы уверены, что хотите удалить этот комментарий?');">
								@csrf
								@method('DELETE')
								<button type="submit"
									class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
									Удалить
								</button>
							</form>
						@endauth
					</div>
				@endforeach
			</div>
		</div>
	</div>
</x-app-layout>