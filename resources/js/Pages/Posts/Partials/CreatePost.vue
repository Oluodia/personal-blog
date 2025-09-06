<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    content: "",
});

const submit = () => {
    form.post(route("posts.create"));
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Создание постов</h2>
            <p class="mt-1 text-sm text-gray-600">
                Создайте свой пост для блога
            </p>
        </header>

        <form @submit.prevent="submit">
            <div class="mb-6">
                <InputLabel for="title">Заголовок</InputLabel>
                <TextInput
                    id="title"
                    class="mt-1 block w-full mb-5"
                    v-model="form.title"
                    required
                />
                <InputError :message="form.errors.title" class="mt-2" />

                <InputLabel for="content">Контент</InputLabel>
                <textarea
                    name="content"
                    id="content"
                    rows="6"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    v-model="form.content"
                ></textarea>
                <InputError :message="form.errors.content" class="mt-2" />
            </div>

            <PrimaryButton type="submit" :disabled="form.processing"
                >Создать</PrimaryButton
            >
        </form>
    </section>
</template>
