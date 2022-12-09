<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('fbDates.index')">Factura de facebook</Link>
            </h2>
        </template>
        <container>
            <card>
                <div class="py-5 px-10">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="text-2xl mb-5">Resumen del pago</h4>
                            <div class="flex flex-col gap-y-2">
                                <p class="text-gray-500">Intervalo de fechas</p>
                                <p>{{ start_date }} / {{ ends_date }}</p>
                            </div>
                        </div>
                        <div>
                            <jet-button :href="route('fbBills.create')"
                                >Agregar</jet-button
                            >
                            <div class="flex flex-col gap-y-2 mt-5">
                                <p class="text-gray-500">Importe facturado</p>
                                <p class="text-4xl">
                                    <span class="text-red-700"
                                        >${{ handleAmount }}</span
                                    >
                                    / {{ total_amount }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="border-t-2 border-b-2 border-gray-300 py-2 mt-10 flex justify-between text-gray-500"
                    >
                        <p>Cliente</p>
                        <p>Campaña</p>
                        <p>Importe</p>
                    </div>
                    <div
                        class="mt-10 grid grid-cols-3 justify-items-center"
                        v-for="fbBill in fbBills.data"
                        :key="fbBill.id"
                    >
                        <div class="w-full">
                            <p>{{ fbBill.clients.business }}</p>
                        </div>

                        <div>
                            <p>{{ fbBill.campaign }}</p>
                        </div>

                        <div class="w-full flex justify-end gap-x-4">
                            <p>${{ fbBill.amount }}</p>
                            <delete-button
                                :url="
                                    route('fbBills.destroy', {
                                        fbBill: fbBill.id,
                                    })
                                "
                                modulName="Importe"
                            />
                        </div>
                    </div>
                </div>
            </card>
        </container>
    </app-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/runtime-core";

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card.vue";
import JetButton from "@/Components/Button.vue";
import DeleteButton from "@/Components/DeleteButton.vue";

export default {
    props: {
        fbBills: {},
    },

    data() {
        return {
            start_date: this.fbBills.data[0]
                ? this.fbBills.data[0].dates.start_at
                : "",
            ends_date: this.fbBills.data[0]
                ? this.fbBills.data[0].dates.ends_at
                : "",
            total_amount: this.fbBills.data[0]
                ? this.fbBills.data[0].dates.total_amount
                : "",
        };
    },

    components: {
        AppLayout,
        Container,
        Card,
        Link,
        JetButton,
        DeleteButton,
    },

    setup(props) {
        const handleAmount = computed(() => {
            const amounts = props.fbBills.data;
            let arrayTotal = [];

            amounts.map((a) => {
                arrayTotal.push(+a.amount);
            });

            let totalAmount = arrayTotal.reduce((a, b) => a + b, 0.0);

            return totalAmount;
        });

        return { handleAmount };
    },
};
</script>
