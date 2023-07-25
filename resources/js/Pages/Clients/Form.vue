<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('clients.index')">Clientes</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500" v-if="edit">Editar Cliente</span>
                <span class="text-gray-500" v-else>Agregar Cliente</span>
            </h2>
        </template>
        <container>
            <card class="p-8">
                <h3 class="font-medium text-3xl mb-8" v-if="edit">
                    Editar Cliente
                </h3>
                <h3 class="font-medium text-3xl mb-8" v-else>
                    Registrar Cliente
                </h3>
                <form
                    @submit.prevent="handlerSave"
                    class="flex flex-col gap-y-8"
                >
                    <div class="grid grid-cols-3 gap-x-5">
                        <!-- Nombre empresa -->
                        <div>
                            <jet-label
                                for="business"
                                value="Nombre de la empresa"
                            />

                            <jet-input
                                id="business"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.business"
                            />

                            <jet-input-error
                                :message="form.errors.business"
                                class="mt-2"
                            />
                        </div>

                        <!-- Nombre propietario -->
                        <div>
                            <jet-label
                                for="owner"
                                value="Nombre del propietario"
                            />

                            <jet-input
                                id="owner"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.owner"
                            />

                            <jet-input-error
                                :message="form.errors.owner"
                                class="mt-2"
                            />
                        </div>

                        <!-- Numero celular -->
                        <div>
                            <jet-label for="phone" value="Número de Teléfono" />

                            <jet-input
                                id="phone"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.phone"
                            />

                            <jet-input-error
                                :message="form.errors.phone"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-x-5">
                        <!-- RIF -->
                        <div>
                            <jet-label for="rif" value="RIF/V" />

                            <jet-input
                                id="rif"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.rif"
                            />

                            <jet-input-error
                                :message="form.errors.rif"
                                class="mt-2"
                            />
                        </div>

                        <!-- fecha de ingreso -->
                        <div>
                            <jet-label for="entry" value="fecha de ingreso" />

                            <jet-input
                                id="entry"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.entry_at"
                            />

                            <jet-input-error
                                :message="form.errors.entry_at"
                                class="mt-2"
                            />
                        </div>

                        <!-- Monto -->
                        <div>
                            <jet-label for="balance" value="Monto" />

                            <jet-input
                                id="balance"
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

                    <div class="grid grid-cols-3 gap-x-5">
                        <!-- Saldo -->
                        <div>
                            <jet-label for="balance" value="Costo Inducción" />

                            <jet-input
                                id="balance"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.induction"
                            />

                            <jet-input-error
                                :message="form.errors.induction"
                                class="mt-2"
                            />
                        </div>
                        <!-- Saldo -->
                        <div>
                            <jet-label for="balance" value="Saldo" />

                            <jet-input
                                id="balance"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.balance"
                            />

                            <jet-input-error
                                :message="form.errors.balance"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div>
                        <jet-label for="address" value="Dirección" />

                        <textarea
                            id="address"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.address"
                        />

                        <jet-input-error
                            :message="form.errors.address"
                            class="mt-2"
                        />
                    </div>

                    <div>
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
        client: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                _method: this.edit ? "PUT" : "",
                business: "",
                owner: "",
                phone: "",
                address: "",
                rif: "",
                entry_at: "",
                balance: null,
                induction: 0,
                total: 0,
            }),
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
                      route("clients.update", { id: this.client.data.id })
                  )
                : this.form.post(route("clients.store"));
        },
    },

    watch: {
        "form.induction"(induction) {
            this.form.balance = this.form.total - induction;
        },
    },

    mounted() {
        if (this.edit) {
            this.form.business = this.client.data.business;
            this.form.owner = this.client.data.owner;
            this.form.phone = this.client.data.phone;
            this.form.address = this.client.data.address;
            this.form.rif = this.client.data.rif;
            this.form.entry_at = this.client.data.entry_at;
            this.form.total = this.client.data.total;
            this.form.induction = this.client.data.induction;
            this.form.balance = this.client.data.balance;
        }
    },
};
</script>
