<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const { props } = usePage();

const currentLayout = computed(() => {
    return props.auth.user ? AuthenticatedLayout : GuestLayout;
});
</script>

<template>
    <component :is="currentLayout">
        <slot />
    </component>
</template>
