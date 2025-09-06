<script setup>
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
import CreatePost from "./Partials/CreatePost.vue";
import DeletePost from "./Partials/DeletePost.vue";
import ToUpdatePost from "./Partials/ToUpdatePost.vue";

defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <Head title="Посты" />

    <Layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Посты
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <CreatePost class="max-w-xl" />
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <ToUpdatePost class="max-w-xl" :posts="posts" />
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <DeletePost class="max-w-xl" :posts="posts" />
                </div>
            </div>
        </div>
    </Layout>
</template>
