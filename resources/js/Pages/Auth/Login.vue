<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const page = usePage();

const form = useForm({
    login: null,
    password: null,
});
</script>

<template>
    <div
        class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-"
    >
        <!-- Форма входа -->
        <form
            @submit.prevent="form.post('/login')"
            class="bg-gray-200 rounded-lg shadow-md p-6 w-full max-w-md"
        >
            <!-- Поле login -->
            <div class="mb-6">
                <label
                    for="login"
                    class="block text-sm font-medium text-gray-700"
                    >Логин</label
                >
                <input
                    type="text"
                    name="login"
                    id="login"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    v-model="form.login"
                    required
                    autofocus
                />
                <div v-if="form.errors.login">{{ form.errors.login }}</div>
            </div>
            <!-- Поле Пароль -->
            <div class="mb-6">
                <label
                    for="password"
                    class="block text-sm font-medium text-gray-700"
                    >Пароль</label
                >
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    v-model="form.password"
                    required
                />
                <div v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <!-- Кнопка Войти -->
            <div class="mb-6">
                <PrimaryButton type="submit" :disabled="form.processing"
                    >Войти</PrimaryButton
                >
            </div>
            <div class="text-center">
                <Link :href="route('home')" class="text-indigo-500"
                    ><i class="fa-thin fa-arrow-left"></i>На главную</Link
                >
            </div>
        </form>
    </div>
    <!-- <Head title="Log in" />

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <InputLabel for="email" value="Email" />

            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
            <InputLabel for="password" value="Password" />

            <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="current-password"
            />

            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4 block">
            <label class="flex items-center">
                <Checkbox name="remember" v-model:checked="form.remember" />
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Forgot your password?
            </Link>

            <PrimaryButton
                class="ms-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Log in
            </PrimaryButton>
        </div>
    </form> -->
</template>
