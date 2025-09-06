<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Layout from "@/Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    post: Array,
    comments: {
        type: Array,
        default: () => [],
    },
    isAuth: Boolean,
});

const form = useForm({
    name: "",
    content: "",
});

console.log(props.comments);

const addComment = () => {
    return form.post(route("comments.store", { post: props.post.id }), {
        onSuccess: () => form.reset(),
    });
};

const deleteComment = (commentId) => {
    return form.delete(
        route("comments.destroy", {
            comment: commentId,
            post: props.post.id,
        })
    );
};
</script>
<template>
    <Layout>
        <div class="px-8 py-16 bg-white rounded-md">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ post.title }}
            </h2>

            <div class="text-gray-600 mb-6 border-b-2 pb-2 border-gray-900">
                <span class="font-semibold">{{
                    new Date(post.created_at).toLocaleString()
                }}</span>
                |
                <span class="italic">Автор: {{ post.author }}</span>
            </div>

            <div class="prose max-w-none mb-8">
                {{ post.content }}
            </div>

            <div class="mt-8">
                <header>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        Комментарии
                    </h3>
                </header>

                <form @submit.prevent="addComment" class="mb-8">
                    <TextInput
                        type="text"
                        hidden
                        name="_id"
                        v-model="form.postId"
                        value="{{ post.id }}"
                    />

                    <div class="mb-4">
                        <TextInput
                            type="text"
                            name="name"
                            placeholder="Ваше имя"
                            class="border-gray-500 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-600"
                            v-model="form.name"
                            required
                        />
                    </div>

                    <div class="mb-4">
                        <textarea
                            name="content"
                            rows="4"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-600"
                            placeholder="Напишите ваш комментарий..."
                            v-model="form.content"
                            required
                        ></textarea>
                    </div>

                    <PrimaryButton type="submit"> Отправить </PrimaryButton>
                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p
                            v-if="form.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Создано.
                        </p>
                    </Transition>
                </form>

                <div class="space-y-4" v-if="comments && comments.length > 0">
                    <div
                        v-for="comment in comments"
                        :key="comment.id"
                        class="p-4 bg-gray-50 rounded-lg border-2"
                    >
                        <div
                            class="flex justify-between items-center pb-2 mb-2 border-b-2"
                        >
                            <span class="font-semibold text-indigo-600">{{
                                comment.name
                            }}</span>
                            <span class="text-sm text-gray-500">{{
                                new Date(comment.created_at).toLocaleString()
                            }}</span>
                        </div>
                        <p class="text-gray-700 mb-3">{{ comment.comment }}</p>
                        <form
                            v-if="isAuth"
                            @submit.prevent="deleteComment(comment.id)"
                            onsubmit="return confirm('Вы уверены, что хотите удалить этот комментарий?');"
                        >
                            <button
                                type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200"
                            >
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
