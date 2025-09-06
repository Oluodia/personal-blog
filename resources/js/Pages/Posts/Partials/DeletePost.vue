<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
});

const deletePost = () => {
    if (form.title) {
        form.delete(route("posts.destroy"), {
            onBefore: () => {
                return confirm("Вы уверены, что хотите удалить пост?");
            },
        });
    }
};

const props = defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Удалить пост</h2>
            <p class="mt-1 text-sm text-gray-600">
                Пост будет полностью удален без возможности восстановления
            </p>
        </header>

        <div
            v-if="posts.length === 0"
            class="bg-yellow-50 border border-yellow-200 rounded-md p-4"
        >
            <p class="text-yellow-800">Нет доступных постов для удаления</p>
        </div>

        <form @submit.prevent="deletePost">
            <div class="mb-6">
                <InputLabel
                    for="title-select"
                    class="block text-sm font-medium text-gray-700 mb-2"
                    >Выберите заголовок</InputLabel
                >
                <select
                    id="title-select"
                    v-model="form.title"
                    class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required
                >
                    <option value="" class="text-gray-400">
                        --Пожалуйста, выберите заголовок--
                    </option>
                    <option
                        v-for="post in posts"
                        :key="post.id"
                        :value="post.title"
                    >
                        {{ post.title }}
                    </option>
                </select>
            </div>

            <DangerButton type="submit" :disabled="form.processing"
                >Удалить пост</DangerButton
            >
        </form>
    </section>
</template>
