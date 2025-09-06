<script setup>
import Layout from "@/Layouts/Layout.vue";
import { Link, WhenVisible } from "@inertiajs/vue3";

const props = defineProps({
    posts: Array,
});
</script>

<template>
    <Layout>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <section
                v-for="post in posts"
                :key="post.id"
                class="bg-white rounded-lg shadow-md p-6 mb-8 hover:-translate-y-2 transition"
            >
                <WhenVisible data="post" :buffer="10">
                    <template #fallback>Loading</template>
                    <Link :href="route('posts.post', { post: post.id })">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">
                                {{
                                    post.title.length > 84
                                        ? post.title.substring(0, 83) + "..."
                                        : post.title
                                }}
                            </h2>

                            <p class="text-gray-600 mt-2">
                                <span class="font-semibold">{{
                                    new Date(post.created_at).toLocaleString()
                                }}</span>
                                |
                                <span>Автор: {{ post.author }}</span>
                            </p>

                            <p class="mt-4">
                                {{
                                    post.content.length > 150
                                        ? post.content.substring(0, 149) + "..."
                                        : post.content
                                }}
                            </p>

                            <Link
                                :href="route('posts.post', { post: post.id })"
                                class="text-indigo-600 hover:underline mt-4 inline-block"
                                >Читать далее...</Link
                            >
                        </div>
                    </Link>
                </WhenVisible>
            </section>
        </div>
    </Layout>
</template>
