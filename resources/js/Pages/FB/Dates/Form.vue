<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('fbDates.index')">Facturas de Facebook</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500" v-if="edit">Editar Factura</span>
                <span class="text-gray-500" v-else>Agregar Factura</span>
            </h2>
        </template>
        <container>
            <card class="p-8">
                <h3 class="font-medium text-3xl mb-8" v-if="edit">
                    Editar Factura
                </h3>
                <h3 class="font-medium text-3xl mb-8" v-else>
                    Registrar Factura
                </h3>
                <form
                    @submit.prevent="handlerSave"
                    class="flex flex-col gap-y-8"
                >
                    <div class="grid grid-cols-3 gap-x-5">
                        <!-- Fecha de inicio -->
                        <div>
                            <jet-label for="start_at" value="Fecha de inicio" />

                            <jet-input
                                id="start_at"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.start_at"
                            />

                            <jet-input-error
                                :message="form.errors.start_at"
                                class="mt-2"
                            />
                        </div>

                        <!-- Fecha de culminación -->
                        <div>
                            <jet-label
                                for="ends_at"
                                value="Fecha de culminación"
                            />

                            <jet-input
                                id="ends_at"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.ends_at"
                            />

                            <jet-input-error
                                :message="form.errors.ends_at"
                                class="mt-2"
                            />
                        </div>

                        <!-- Importe facturado -->
                        <div>
                            <jet-label
                                for="total_amount"
                                value="Importe Facturado"
                            />

                            <jet-input
                                id="total_amount"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.total_amount"
                            />

                            <jet-input-error
                                :message="form.errors.total_amount"
                                class="mt-2"
                            />
                        </div>
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
        fbDate: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                _method: this.edit ? "PUT" : "",
                start_at: "",
                ends_at: "",
                total_amount: "",
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
                      route("fbDates.update", { id: this.fbDate.data.id })
                  )
                : this.form.post(route("fbDates.store"));
        },
    },

    mounted() {
        if (this.edit) {
            this.form.start_at = this.fbDate.data.start_at;
            this.form.ends_at = this.fbDate.data.ends_at;
            this.form.total_amount = this.fbDate.data.total_amount;
        }
    },
};
</script>
