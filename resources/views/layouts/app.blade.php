<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой Блог</title>
    <!-- Подключаем Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Шапка сайта -->
    <header class="bg-purple-600 text-white shadow">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <a href="{{ route('home') }}">
                <h1 class="text-2xl font-bold">Мой Блог</h1>
            </a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="hover:text-purple-200">Главная</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-purple-200">Обо мне</a></li>
                    @auth
                        <li><a href="{{ route('posts.edit') }}" class="hover:text-purple-200">Редактор блога</a></li>
                        <li><a href="{{ route('profile.edit') }}"
                                class="hover:text-purple-200">{{ auth()->user()->name }}</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-purple-200">Войти</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <!-- Основной контент -->
    <main class="flex-grow container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <!-- Футер -->
    <footer class="bg-purple-600 text-white text-center py-2">
        <p>&copy; 2025 Мой Блог</p>
    </footer>
</body>

</html>