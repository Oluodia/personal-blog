<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm, usePage } from "@inertiajs/vue3";

defineProps({
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;
const form = useForm({
    name: user.name,
    login: user.login,
    email: user.email,
});

const submit = () => {
    return form.patch(route("profile.update"), {
        onSuccess: () => window.location.reload(),
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Информация о профиле
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Обновить информацию о профиле
            </p>
        </header>

        <form @submit.prevent="submit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="Имя" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="name" value="Логин" />

                <TextInput
                    id="login"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.login"
                    required
                    autofocus
                    autocomplete="login"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Почта" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing"
                    >Сохранить</PrimaryButton
                >

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
                        Сохранено.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
