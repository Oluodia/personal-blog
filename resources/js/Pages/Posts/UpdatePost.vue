<script setup>
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Layout from "@/Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    post: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.post?.id || "",
    title: props.post?.title || "",
    content: props.post?.content || "",
});

const submit = () => {
    form.patch(route("posts.update"), {
        onError: (errors) => {
            console.log("Errors:", errors);
        },
        onSuccess: () => {
            console.log("Success");
        },
    });
};
</script>

<template>
    <Layout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white p-6 rounded-lg">
                <header>
                    <h1 class="text-lg font-medium text-gray-900 mb-5">
                        Редактирование поста
                    </h1>
                </header>
                <form @submit.prevent="submit">
                    <TextInput type="hidden" v-model="form.id" />

                    <div class="mb-6">
                        <InputLabel
                            for="title"
                            class="block text-sm font-medium text-gray-700"
                            >Заголовок</InputLabel
                        >
                        <TextInput
                            name="title"
                            id="title"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            v-model="form.title"
                        />
                        <InputError :message="form.errors.title" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <InputLabel
                            for="content"
                            class="block text-sm font-medium text-gray-700"
                            >Содержание</InputLabel
                        >
                        <textarea
                            name="content"
                            id="content"
                            rows="6"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            v-model="form.content"
                        ></textarea>
                        <InputError
                            :message="form.errors.content"
                            class="mt-2"
                        />
                    </div>

                    <PrimaryButton type="submit" :disabled="form.processing">
                        Изменить
                    </PrimaryButton>
                </form>
            </div>
        </div>
    </Layout>
</template>
