<template>
    <app-layout title="bills">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Recibo de campañas
            </h2>
        </template>

        <container>
            <div class="flex justify-between">
                <jet-button :href="route('bills.create')"
                    >Registrar Campaña</jet-button
                >

                <form @submit.prevent="submit" method="get" class="w-1/2">
                    <div class="relative">
                        <search-input
                            placeholder="Buscar link de promoción"
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
                <data-table :headers="headers" :items="bills">
                    <tr v-for="bill in bills.data" :key="bill.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ bill.clients.business }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ bill.promotion_link }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ bill.campaign }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ bill.total }} $
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex">
                                <show-button
                                    :url="
                                        route('bills.show', {
                                            bill: bill.id,
                                        })
                                    "
                                />
                                <edit-button
                                    :url="
                                        route('bills.edit', {
                                            bill: bill.id,
                                        })
                                    "
                                />
                                <delete-button
                                    :url="
                                        route('bills.destroy', {
                                            bill: bill.id,
                                        })
                                    "
                                    modulName="Factura"
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
import Card from "@/Components/Card.vue";
import JetButton from "@/Components/Button.vue";
import SearchInput from "@/Components/SearchInput.vue";
import DataTable from "@/Components/DataTable.vue";
import EditButton from "@/Components/EditButton.vue";
import ShowButton from "@/Components/ShowButton.vue";
import DeleteButton from "@/Components/DeleteButton.vue";

export default {
    props: {
        bills: {},
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
        ShowButton,
        DeleteButton,
    },

    methods: {
        submit() {
            this.form.get(route("bills.index"));
        },
    },

    computed: {
        headers() {
            return [
                "Empresa",
                "Link Promoción",
                "Campaña",
                "Total",
                "Acciones",
            ];
        },
    },
};
</script>
