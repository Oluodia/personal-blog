<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход | Мой Блог</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-purple-600 to-indigo-600 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <!-- Логотип или заголовок -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-purple-800">Мой Блог</h1>
            <p class="mt-2 text-gray-600">Добро пожаловать! Войдите в свой аккаунт.</p>
        </div>


        <!-- Форма входа -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('login')
                <p class=''>{{ $message }}</p>
            @enderror
            <!-- Поле login -->
            <div class="mb-6">
                <label for="login" class="block text-sm font-medium text-gray-700">Login</label>
                <input type="text" name="login" id="login"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                    required autofocus>

            </div>
            <!-- Поле Пароль -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                    required>
            </div>
            <!-- Кнопка Войти -->
            <div class="mb-6">
                <button type="submit"
                    class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    Войти
                </button>
            </div>
        </form>
    </div>
</body>

</html>