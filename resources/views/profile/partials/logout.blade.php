<section>
	<header>
		<h2 class="text-lg font-medium text-purple-800">Выйти из аккаунта</h2>
	</header>

	<form method="post" action="{{ route('logout') }}" class="mt-6">
		@csrf
		@method('post')

		<!-- Кнопка Удалить -->
		<div class="mt-6">
			<button type="submit"
				class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
				Выйти из аккаунт
			</button>
		</div>
	</form>
</section>