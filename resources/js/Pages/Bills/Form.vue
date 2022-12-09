<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('bills.index')">Facturas</Link>
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
                    <!-- Nombre empresa -->
                    <div>
                        <jet-label
                            for="business"
                            value="Nombre de la empresa"
                        />

                        <select
                            name="business"
                            id="client_id"
                            class="block w-full border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
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

                    <!-- Link Promoción -->
                    <div>
                        <jet-label
                            for="promotion_link"
                            value="Link de la Promoción"
                        />

                        <jet-input
                            id="promotion_link"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.promotion_link"
                        />

                        <jet-input-error
                            :message="form.errors.promotion_link"
                            class="mt-2"
                        />
                    </div>

                    <div class="flex items-center gap-x-5">
                        <!-- Campañas -->
                        <div>
                            <jet-label for="campaign" value="Campaña" />

                            <jet-input
                                id="campaign"
                                type="text"
                                class="mt-1 block w-[420px]"
                                v-model="form.campaign"
                            />

                            <jet-input-error
                                :message="form.errors.campaign"
                                class="mt-2"
                            />
                        </div>

                        <!-- Tipo -->
                        <div>
                            <jet-label for="type" value="Tipo de campaña" />

                            <select
                                name="type"
                                id="type"
                                class="block w-[250px] border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                v-model="form.type"
                            >
                                <option value="">Seleccionar Tipo</option>

                                <option value="Video">Video</option>
                                <option value="Post">Post</option>
                                <option value="Dark Post">Dark Post</option>

                                <jet-input-error
                                    :message="form.errors.client_id"
                                    class="mt-2"
                                />
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-5">
                        <!-- Fecha de inicio -->
                        <div>
                            <jet-label for="start_at" value="Fecha de inicio" />

                            <jet-input
                                id="start_at"
                                type="date"
                                class="mt-1 block w-[250px]"
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
                                class="mt-1 block w-[250px]"
                                v-model="form.ends_at"
                            />

                            <jet-input-error
                                :message="form.errors.ends_at"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <!-- Dias e inversion por dia-->
                    <div class="flex items-center gap-x-5">
                        <div>
                            <jet-label for="days" value="Dias de promoción" />

                            <jet-input
                                id="days"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.days"
                            />

                            <jet-input-error
                                :message="form.errors.days"
                                class="mt-2"
                            />
                        </div>
                        <div>
                            <jet-label
                                for="investment_per_day"
                                value="Inversión por dia"
                            />

                            <jet-input
                                id="investment_per_day"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.investment_per_day"
                            />

                            <jet-input-error
                                :message="form.errors.investment_per_day"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <jet-label for="invoiced" value="Facturado" />
                            <jet-input
                                id="invoiced"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.invoiced"
                            />

                            <jet-input-error
                                :message="form.errors.invoiced"
                                class="mt-2"
                            />
                        </div>
                    </div>

                    <!-- Porcentaje de comisión -->
                    <div>
                        <div class="flex items-center gap-x-5">
                            <div>
                                <jet-label
                                    for="commission"
                                    value="Porcentaje de Comisión"
                                />
                                <jet-input
                                    type="number"
                                    :value="commissionValue"
                                    v-model="commissionValue"
                                />

                                <jet-input-error
                                    :message="form.errors.total"
                                    class="mt-2"
                                />
                            </div>

                            <!-- Comisiones -->
                            <div>
                                <jet-label
                                    for="commission"
                                    value="Comisión Total"
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
                                <jet-label
                                    for="total"
                                    value="Inversión total"
                                />
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

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card.vue";

export default {
    props: {
        edit: Boolean,
        bill: Object,
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
                promotion_link: "",
                campaign: "",
                type: "",
                start_at: "",
                ends_at: "",
                days: "",
                investment_per_day: "",
                invoiced: "",
                commission: "",
                total: "",
            }),

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
    },

    methods: {
        handlerSave() {
            this.edit
                ? this.form.post(
                      route("bills.update", { id: this.bill.data.id })
                  )
                : this.form.post(route("bills.store"));
        },
    },

    watch: {
        "form.invoiced"(invoiced) {
            this.form.commission = (invoiced / 100) * this.commissionValue;
        },

        commissionValue(value) {
            this.form.commission = (this.form.invoiced / 100) * value;
        },

        "form.commission"(commission) {
            this.form.total = +commission + +this.form.invoiced;
        },
    },

    mounted() {
        if (this.edit) {
            this.form.client_id = this.bill.data.client_id;
            this.form.promotion_link = this.bill.data.promotion_link;
            this.form.campaign = this.bill.data.campaign;
            this.form.type = this.bill.data.type;
            this.form.start_at = this.bill.data.start_at;
            this.form.ends_at = this.bill.data.ends_at;
            this.form.days = this.bill.data.days;
            this.form.investment_per_day = this.bill.data.investment_per_day;
            this.form.invoiced = this.bill.data.invoiced;
            this.form.commission = this.bill.data.commission;
            this.form.total = this.bill.data.total;
        }
    },
};
</script>
