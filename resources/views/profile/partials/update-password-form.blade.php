<section>
    <header>
        <h2 class="text-lg font-medium text-purple-800">Обновление пароля</h2>
        <p class="mt-1 text-sm text-gray-600">Убедитесь, что ваш аккаунт использует длинный случайный пароль для
            безопасности.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Текущий пароль -->
        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-700">Текущий пароль</label>
            <input id="current_password" name="current_password" type="password" required
                autocomplete="current-password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            @error('current_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Новый пароль -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Новый пароль</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Подтверждение пароля -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтвердите
                пароль</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                autocomplete="new-password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Кнопка Сохранить -->
        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                Сохранить
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600">Пароль обновлен.</p>
            @endif
        </div>
    </form>
</section>