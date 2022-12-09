<template>
    <app-layout title="facebook bills dates">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Facturas de facebook
            </h2>
        </template>

        <container>
            <div class="flex justify-between">
                <jet-button :href="route('fbDates.create')"
                    >Registrar facturas</jet-button
                >

                <form @submit.prevent="submit" method="get" class="w-1/2">
                    <div class="relative">
                        <search-input
                            placeholder="Buscar"
                            type="text"
                            class="w-full"
                            v-model="form.name"
                        />
                        <button type="submit" class="absolute right-4 top-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-purple-500 hover:text-purple-800"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <card>
                <data-table :headers="headers" :items="fbDates">
                    <tr v-for="fbDate in fbDates.data" :key="fbDate.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ fbDate.start_at }} / {{ fbDate.ends_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            $
                            {{ fbDate.total_amount }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex">
                                <show-button
                                    :url="
                                        route('fbDates.show', {
                                            fbDate: fbDate.id,
                                        })
                                    "
                                />
                                <edit-button
                                    :url="
                                        route('fbDates.edit', {
                                            fbDate: fbDate.id,
                                        })
                                    "
                                />
                                <delete-button
                                    :url="
                                        route('fbDates.destroy', {
                                            fbDate: fbDate.id,
                                        })
                                    "
                                    modulName="Fecha"
                                />
                            </div>
                        </td>
                    </tr>
                </data-table>
            </card>
        </container>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import JetButton from "@/Components/Button.vue";
import SearchInput from "@/Components/SearchInput.vue";
import Card from "@/Components/Card.vue";
import DataTable from "@/Components/DataTable.vue";
import EditButton from "@/Components/EditButton.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import ShowButton from "@/Components/ShowButton.vue";

import { Link } from "@inertiajs/inertia-vue3";

export default {
    props: {
        fbDates: {},
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
            }),
        };
    },

    components: {
        AppLayout,
        Container,
        JetButton,
        SearchInput,
        Card,
        DataTable,
        EditButton,
        DeleteButton,
        ShowButton,
        Link,
    },

    methods: {
        submit() {
            this.form.get(route("refills.index"));
        },
    },

    computed: {
        headers() {
            return ["Intervalo de fechas", "Importe Facturado", "Acciones"];
        },
    },
};
</script>
