<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-white">
        <div
            v-if="canLogin"
            class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
        >
            <Link
                v-if="$page.props.user"
                :href="route('dashboard')"
                class="text-sm text-gray-600 hover:text-gray-700 underline"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-sm text-gray-600 hover:text-gray-700 underline"
                    >Iniciar sesión</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-600 hover:text-gray-700 underline"
                    >Registrarse</Link
                >
            </template>
        </div>
        <div class="my-auto">
            <img src="/icon.png" alt="icon" class="w-40 h-40 animate-bounce" />
        </div>
    </div>
</template>
