<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('fbBills.index')">Facturas de Facebook</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500" v-if="edit">Editar Importe</span>
                <span class="text-gray-500" v-else>Agregar Importe</span>
            </h2>
        </template>
        <container>
            <card class="p-8">
                <h3 class="font-medium text-3xl mb-8" v-if="edit">
                    Editar Importe
                </h3>
                <h3 class="font-medium text-3xl mb-8" v-else>
                    Agregar Importe
                </h3>
                <form
                    @submit.prevent="handlerSave"
                    class="flex flex-col gap-y-8"
                >
                    <div class="flex items-center gap-x-5 w-full">
                        <div>
                            <jet-label for="date" value="Intervalo de fecha" />

                            <select
                                name="date"
                                id="date_id"
                                class="block w-[250px] border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                v-model="form.date_id"
                            >
                                <option value="">Seleccionar Fecha</option>

                                <option
                                    v-for="date in dates.data"
                                    :key="date.id"
                                    :value="date.id"
                                >
                                    {{ date.start_at }} / {{ date.ends_at }}
                                </option>

                                <jet-input-error
                                    :message="form.errors.date_id"
                                    class="mt-2"
                                />
                            </select>
                        </div>
                        <!-- Empresa -->
                        <div>
                            <jet-label for="business" value="Empresa" />

                            <select
                                name="business"
                                id="business_id"
                                class="block w-[250px] border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                @change="handleChange($event)"
                                v-model="form.client_id"
                            >
                                <option value="">Seleccionar Empresa</option>

                                <option
                                    v-for="client in clients.data"
                                    :key="client.id"
                                    :value="client.id"
                                >
                                    {{ client.business }}
                                </option>

                                <jet-input-error
                                    :message="form.errors.client_id"
                                    class="mt-2"
                                />
                            </select>
                        </div>
                        <!-- Campaña -->
                        <div>
                            <jet-label for="campaign" value="Campaña" />

                            <jet-input
                                id="campaign"
                                type="text"
                                class="mt-1 w-[400px]"
                                v-model="form.campaign"
                            />

                            <jet-input-error
                                :message="form.errors.campaign"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <div class="flex items-center gap-x-5 w-full">
                        <!-- Importe facturado -->
                        <div>
                            <jet-label
                                for="amount"
                                value="Importe de Facebook"
                            />

                            <jet-input
                                id="amount"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.amount"
                            />

                            <jet-input-error
                                :message="form.errors.amount"
                                class="mt-2"
                            />
                        </div>

                        <!-- Porcentaje de comisión -->
                        <div>
                            <jet-label
                                for="commission"
                                value="Porcentaje de Servicios"
                            />
                            <jet-input
                                type="number"
                                :value="commissionValue"
                                v-model="commissionValue"
                            />
                        </div>

                        <!-- Comisiones -->
                        <div>
                            <jet-label
                                for="commission"
                                value="Comisión de Servicios"
                            />

                            <jet-input
                                id="commission"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.commission"
                            />

                            <jet-input-error
                                :message="form.errors.commission"
                                class="mt-2"
                            />
                        </div>

                        <!-- Inversión total -->

                        <div>
                            <jet-label for="total" value="Total a debitar" />
                            <jet-input
                                id="total"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.total"
                            />

                            <jet-input-error
                                :message="form.errors.total"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <div class="hidden" id="save-button">
                        <jet-action-message
                            :on="form.recentlySuccessful"
                            class="mr-3"
                        >
                            <span v-if="edit">Editado</span>
                            <span v-else>Guardado</span>
                        </jet-action-message>

                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            <span v-if="edit">Editar</span>
                            <span v-else>Guardar</span>
                        </jet-button>
                    </div>
                </form>

                <form
                    @submit.prevent="handleUpdate"
                    class="flex flex-col gap-y-8 mt-14"
                >
                    <div class="flex gap-x-10">
                        <!-- Saldo cliente -->
                        <div>
                            <jet-label
                                for="current_balance"
                                value="Saldo actual del cliente"
                            />

                            <jet-input
                                id="current_balance"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                :value="currentBalance"
                                v-model="currentBalance"
                            />
                        </div>
                        <!-- Nuevo saldo -->
                        <div>
                            <jet-label
                                for="newBalance"
                                value="Saldo actualizado"
                            />

                            <jet-input
                                id="newBalance"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="balanceForm.balance"
                            />
                        </div>
                    </div>

                    <div>
                        <jet-action-message
                            :on="form.recentlySuccessful"
                            class="mr-3"
                        >
                            <span>Actualizando</span>
                        </jet-action-message>

                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            <span>Actualizar</span>
                        </jet-button>
                    </div>
                </form>
            </card>
        </container>
    </app-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

import JetButton from "@/Components/Button.vue";
import JetLabel from "@/Components/InputLabel.vue";
import JetInput from "@/Components/TextInput.vue";
import JetInputError from "@/Components/InputError.vue";
import JetActionMessage from "@/Components/ActionMessage.vue";
import TextArea from "@/Components/Textarea.vue";

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card.vue";

export default {
    props: {
        edit: Boolean,
        fbBill: Object,
        dates: {
            type: Object,
            default: function () {
                return {
                    data: [],
                };
            },
        },
        clients: {
            type: Object,
            default: function () {
                return {
                    data: [],
                };
            },
        },
    },

    data() {
        return {
            form: this.$inertia.form({
                _method: this.edit ? "PUT" : "",
                date_id: "",
                client_id: "",
                campaign: "",
                amount: "",
                commission: "",
                total: "",
            }),
            balanceForm: this.$inertia.form({
                _method: "PUT",
                balance: "",
            }),

            currentBalance: "",
            commissionValue: 20,
        };
    },

    components: {
        AppLayout,
        Link,
        Container,
        Card,
        JetButton,
        JetLabel,
        JetInput,
        JetInputError,
        JetActionMessage,
        TextArea,
    },

    methods: {
        handlerSave() {
            if (this.edit) {
                this.form.post(
                    route("fbBills.update", { id: this.fbBill.data.id })
                );
            } else {
                this.form.post(route("fbBills.store"));
            }
        },

        handleUpdate() {
            const saveButton = document.getElementById("save-button");
            saveButton.classList.remove("hidden");
            this.balanceForm.post(
                route("fbBills.update", { id: this.form.client_id })
            );
        },

        handleChange(event) {
            let currentBalance = this.clients.data.find(
                (item) => item.id == event.target.value
            );

            // let first = currentBalance.length > 0 ? currentBalance[0] : null;

            this.currentBalance = currentBalance.balance;
        },
    },

    watch: {
        "form.amount"(amount) {
            this.form.commission = (amount / 100) * this.commissionValue;
        },

        "form.total"(total) {
            this.balanceForm.balance = this.currentBalance - total;
        },

        commissionValue(value) {
            this.form.commission = (this.form.amount / 100) * value;
        },

        "form.commission"(commission) {
            this.form.total = +commission + +this.form.amount;
        },
    },

    mounted() {
        if (this.edit) {
            this.form.date_id = this.fbBill.data.date_id;
            this.form.client_id = this.fbBill.data.client_id;
            this.form.campaign = this.fbBill.data.campaign;
            this.form.amount = this.fbBill.data.amount;
        }
    },
};
</script>
