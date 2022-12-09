<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('clients.index')">Clientes</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500">{{ client.data.business }}</span>
            </h2>
        </template>
        <container>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-2xl font-medium leading-6 text-gray-900">
                        {{ client.data.business }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-gray-500 text-sm">
                        {{ client.data.owner }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Teléfono</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ client.data.phone }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Dirección</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ client.data.address }}
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">RIF</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ client.data.rif }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Saldo actual
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ client.data.balance }}
                            </dd>
                        </div>

                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Archivos</dt>
                            <dd>
                                <form @submit.prevent="submit" method="get">
                                    <button type="submit" class="flex gap-x-1">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-5 h-5 text-gray-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                                            />
                                        </svg>

                                        <span
                                            class="font-medium text-purple-600 hover:text-purple-500"
                                            >Ver Facturas</span
                                        >
                                    </button>
                                </form>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </container>
    </app-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card.vue";
import SearchButton from "@/Components/SearchButton.vue";

export default {
    props: {
        client: {},
    },

    data() {
        return {
            form: this.$inertia.form({
                id: this.client.data.id,
            }),
        };
    },

    components: {
        AppLayout,
        Container,
        Card,
        Link,
        SearchButton,
    },

    methods: {
        submit() {
            this.form.get(route("refills.index"));
        },
    },
};
</script>
