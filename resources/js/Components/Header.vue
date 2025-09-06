<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <header class="text-white border-b border-gray-700">
        <div
            class="container mx-auto px-4 py-6 flex justify-between items-center"
        >
            <Link :href="route('home')" class="hover:-translate-y-1 transition">
                <h1 class="text-2xl font-bold">Мой Блог</h1>
            </Link>
            <nav>
                <ul class="flex space-x-4">
                    <li>
                        <Link
                            :href="route('home')"
                            class="hover:text-indigo-200"
                        >
                            Главная
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('about')"
                            class="hover:text-indigo-200"
                        >
                            Обо мне
                        </Link>
                    </li>

                    <slot />
                </ul>
            </nav>
        </div>
    </header>
</template>
