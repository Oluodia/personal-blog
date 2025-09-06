<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm();

const logout = () => {
    form.post(route("profile.logout"), {
        preserveScroll: true,
        onBefore: () => {
            return confirm("Вы уверены, что хотите выйти из аккаунта?");
        },
    });
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Выйти из аккаунта</h2>
        </header>

        <form @submit.prevent="logout">
            <DangerButton>Выйти из аккаунта</DangerButton>
        </form>
    </section>
</template>
