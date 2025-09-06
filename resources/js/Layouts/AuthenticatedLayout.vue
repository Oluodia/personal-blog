<script setup>
import Footer from "@/Components/Footer.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import Header from "../Components/Header.vue";

const { props } = usePage();

const user = computed(() => {
    return props.auth.user;
});
</script>

<template>
    <Header>
        <li>
            <Link :href="route('posts.edit')" class="hover:text-indigo-200">
                Редактор блога
            </Link>
        </li>
        <li>
            <Link :href="route('profile.edit')" class="hover:text-indigo-200">
                {{ user["name"] }}
            </Link>
        </li>
    </Header>

    <main class="flex-grow container mx-auto px-4 py-8">
        <slot />
    </main>

    <Footer />
</template>
