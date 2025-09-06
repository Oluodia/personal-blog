<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
});

const props = defineProps({
    posts: {
        type: Object,
        default: () => [],
    },
});

const submit = () => {
    form.get(route("posts.showUpdate"), { title: form.title });
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Редактировать пост
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                Выберите пост чтобы отредактировать его заголовок и контент
            </p>
        </header>

        <div
            v-if="posts.length === 0"
            class="bg-yellow-50 border border-yellow-200 rounded-md p-4"
        >
            <p class="text-yellow-800">
                Нет доступных постов для редактирования
            </p>
        </div>

        <form @submit.prevent="submit">
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
                    <option value="" class="text-gray-400" selected>
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
            <PrimaryButton type="submit" :disabled="form.processing"
                >Редактировать</PrimaryButton
            >
        </form>
    </section>
</template>
