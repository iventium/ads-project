<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('refills.index')">Recargas</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500" v-if="edit">Editar Recarga</span>
                <span class="text-gray-500" v-else>Agregar Recarga</span>
            </h2>
        </template>
        <container>
            <card class="p-8">
                <h3 class="font-medium text-3xl mb-8" v-if="edit">
                    Editar Recarga
                </h3>
                <h3 class="font-medium text-3xl mb-8" v-else>
                    Registrar Recarga
                </h3>
                <form
                    @submit.prevent="handlerSave"
                    class="flex flex-col gap-y-8"
                >
                    <!-- Nombre empresa -->
                    <div class="grid grid-cols-3 gap-x-5">
                        <div>
                            <jet-label
                                for="business"
                                value="Nombre de la empresa"
                            />

                            <select
                                name="business"
                                id="client_id"
                                class="block w-full border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
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
                        <!-- Banco -->
                        <div>
                            <jet-label for="bank" value="Banco" />

                            <select
                                name="bank"
                                id="bank"
                                class="block w-full border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                v-model="form.bank"
                            >
                                <option value="">Seleccionar Banco</option>

                                <option value="Mercantil">Mercantil</option>
                                <option value="Banesco">Banesco</option>
                                <option value="Bank of America">
                                    Bank of America
                                </option>
                                <option value="Wells Fargo">Wells Fargo</option>

                                <jet-input-error
                                    :message="form.errors.bank"
                                    class="mt-2"
                                />
                            </select>
                        </div>
                        <!-- Fecha de inicio -->
                        <div>
                            <jet-label
                                for="date"
                                value="Fecha de realización"
                            />

                            <jet-input
                                id="date"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.date"
                            />

                            <jet-input-error
                                :message="form.errors.date"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-x-5">
                        <!-- Referencia -->
                        <div>
                            <jet-label
                                for="reference"
                                value="Referencia bancaria"
                            />

                            <jet-input
                                id="reference"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.reference"
                            />

                            <jet-input-error
                                :message="form.errors.reference"
                                class="mt-2"
                            />
                        </div>
                        <!-- pago -->
                        <div>
                            <jet-label for="payment" value="Pago" />

                            <jet-input
                                id="payment"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.payment"
                            />

                            <jet-input-error
                                :message="form.errors.payment"
                                class="mt-2"
                            />
                        </div>
                        <!-- Tasa -->
                        <div>
                            <div>
                                <jet-label for="rate" value="Tasa" />
                                <jet-input
                                    id="rate"
                                    type="number"
                                    step="0.01"
                                    class="mt-1 block w-full"
                                    v-model="form.rate"
                                />
                            </div>

                            <!-- <jet-input-error
                                :message="form.errors.rate"
                                class="mt-2"
                            /> -->
                        </div>

                        <!-- Total -->
                        <div>
                            <div>
                                <jet-label
                                    for="total"
                                    value="Total en dólares"
                                />
                                <jet-input
                                    id="total"
                                    type="number"
                                    step="0.01"
                                    class="mt-1 block w-full"
                                    v-model="form.total"
                                />
                            </div>

                            <jet-input-error
                                :message="form.errors.total"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <!-- Comentarios -->
                    <div>
                        <jet-label for="comments" value="Comentarios" />

                        <textarea
                            id="comments"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.comments"
                        />

                        <!-- <jet-input-error
                            :message="form.errors.comments"
                            class="mt-2"
                        /> -->
                    </div>

                    <div class="hidden" id="update-button">
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
                        <!-- Saldo cliente-->
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
                                v-model="currentBalance"
                            />

                            <jet-input-error
                                :message="form.errors.payment"
                                class="mt-2"
                            />
                        </div>

                        <!-- Saldo cliente actualizado -->
                        <div>
                            <jet-label
                                for="updateBalance"
                                value="Saldo actualizado"
                            />

                            <jet-input
                                id="updateBalance"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="balanceForm.balance"
                            />

                            <jet-input-error
                                :message="form.errors.payment"
                                class="mt-2"
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
        refill: Object,
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
                client_id: "",
                payment: "",
                bank: "",
                date: "",
                reference: "",
                rate: null,
                total: "",
                comments: "Sin comentarios",
            }),
            balanceForm: this.$inertia.form({
                _method: "PUT",
                balance: "",
            }),
            currentBalance: "",
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
            this.edit
                ? this.form.post(
                      route("refills.update", { id: this.refill.data.id })
                  )
                : this.form.post(route("refills.store"));
        },

        handleUpdate() {
            const updateButton = document.getElementById("update-button");
            updateButton.classList.remove("hidden");
            this.balanceForm.post(
                route("refills.update", { id: this.form.client_id })
            );
        },

        handleChange(event) {
            let currentBalance = this.clients.data.find(
                (item) => item.id == event.target.value
            );
            // console.log(
            //     "🚀 ~ file: Form.vue ~ line 288 ~ handleChange ~ currentBalance",
            //     currentBalance.balance
            // );

            // let first = currentBalance.length > 0 ? currentBalance[0] : null;

            this.currentBalance = currentBalance.balance;
        },
    },

    watch: {
        "form.rate"(rate) {
            this.form.total = this.form.payment / rate;
        },

        "form.total"(total) {
            this.balanceForm.balance = +this.currentBalance + +total;
        },
    },

    mounted() {
        if (this.edit) {
            this.form.client_id = this.refill.data.client_id;
            this.form.payment = this.refill.data.payment;
            this.form.bank = this.refill.data.bank;
            this.form.date = this.refill.data.date;
            this.form.reference = this.refill.data.reference;
            this.form.rate = this.refill.data.rate;
            this.form.total = this.refill.data.total;
            this.form.comments = this.refill.data.comments;
            this.currentBalance = this.clients.data.balance;
        }
    },
};
</script>
