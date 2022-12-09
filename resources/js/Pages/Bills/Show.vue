<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('bills.index')">Facturas</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500">#{{ bill.data.id }}</span>
            </h2>
        </template>
        <container>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-2xl font-medium leading-6 text-gray-900">
                        {{ bill.data.clients.business }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-gray-500 text-sm">
                        {{ bill.data.clients.owner }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Link Promocional
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.promotion_link }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Campaña</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.campaign }}
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Tipo de campaña
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.type }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Fecha de ingreso
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.start_at }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Fecha de culminación
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.ends_at }}
                            </dd>
                        </div>
                        <!-- <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">About</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                Fugiat ipsum ipsum deserunt culpa aute sint do
                                nostrud anim incididunt cillum culpa consequat.
                                Excepteur qui ipsum aliquip consequat sint. Sit
                                id mollit nulla mollit nostrud in ea officia
                                proident. Irure nostrud pariatur mollit ad
                                adipisicing reprehenderit deserunt qui eu.
                            </dd>
                        </div> -->
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Dias de promoción
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.days }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Inversión por dia
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.investment_per_day }} $
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Facturado</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.invoiced }} $
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Comisión</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.commission }} $
                            </dd>
                        </div>

                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Total</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.total }} $
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

export default {
    props: {
        bill: {},
    },

    components: {
        AppLayout,
        Container,
        Card,
        Link,
    },
};
</script>

<style></style>
