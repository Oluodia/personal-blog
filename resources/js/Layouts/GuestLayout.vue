<script setup>
import Footer from "@/Components/Footer.vue";
import { Link } from "@inertiajs/vue3";
import Header from "../Components/Header.vue";
</script>

<template>
    <Header>
        <li>
            <Link :href="route('login')" class="hover:text-indigo-200">
                Войти
            </Link>
        </li>
    </Header>

    <main class="flex-grow container mx-auto px-4 py-8">
        <slot />
    </main>

    <Footer />
</template>
