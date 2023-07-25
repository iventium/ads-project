<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div
                            class="p-6 sm:px-20 bg-white border-b border-gray-200 flex justify-between"
                        >
                            <div>
                                <div>
                                    <ApplicationLogo
                                        class="block h-12 w-auto"
                                    />
                                </div>

                                <div class="mt-8 text-2xl">
                                    Aplicación de Administración Iventium ADS
                                </div>
                            </div>
                            <form @submit.prevent="handleFilter">
                                <select
                                    name="filter"
                                    id="filter"
                                    class="mr-2 border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    v-model="form.filterDate"
                                >
                                    <option value="">Buscar mes</option>
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>

                                <jet-button
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    <span>Buscar</span>
                                </jet-button>
                            </form>
                        </div>

                        <div
                            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2"
                        >
                            <div class="p-6">
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"
                                        />
                                    </svg>

                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <h2>Depósitos Clientes</h2>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <h3
                                        class="mt-2 text-5xl font-semibold text-purple-600"
                                    >
                                        $ {{ handleDeposits }}
                                    </h3>
                                </div>
                            </div>

                            <div
                                class="p-6 border-t border-gray-200 md:border-t-0 md:border-l"
                            >
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                            class="w-8 h-8 text-gray-400"
                                        >
                                            <path
                                                d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"
                                            />
                                        </svg>
                                    </div>

                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <h2>Facturado de Facebook</h2>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <h3
                                        class="mt-2 text-5xl font-semibold text-teal-400"
                                    >
                                        $ {{ handleInvoiced }}
                                    </h3>
                                </div>
                            </div>

                            <div class="p-6 border-t border-gray-200">
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>

                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <h2>Cargo de servicios</h2>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <h3
                                        class="mt-2 text-5xl font-semibold text-cyan-400"
                                    >
                                        $ {{ handleCommissions }}
                                    </h3>
                                </div>
                            </div>

                            <div
                                class="p-6 border-t border-gray-200 md:border-l"
                            >
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                            class="w-8 h-8 text-gray-400"
                                        >
                                            <path
                                                d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>

                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <h2>Saldos Disponibles Clientes</h2>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <h3
                                        class="mt-2 text-5xl font-semibold text-fuchsia-500"
                                    >
                                        $ {{ handleBalance }}
                                    </h3>
                                </div>
                            </div>

                            <div class="p-6 border-t border-gray-200">
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                            clip-rule="evenodd"
                                        />
                                        <path
                                            d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"
                                        />
                                    </svg>

                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <h2>Saldos Negativos Clientes</h2>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <h3
                                        class="mt-2 text-5xl font-semibold text-red-600"
                                    >
                                        $
                                        {{ handleNegativeBalance }}
                                    </h3>
                                </div>
                            </div>
                            <div
                                class="p-6 border-t md:border-l border-gray-200"
                            >
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                            clip-rule="evenodd"
                                        />
                                        <path
                                            d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"
                                        />
                                    </svg>

                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <h2>Total Facturado</h2>
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <h3
                                        class="mt-2 text-5xl font-semibold text-emerald-400"
                                    >
                                        $
                                        {{ handleCommissions + handleInvoiced }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import JetButton from "@/Components/Button.vue";
import { computed } from "@vue/runtime-core";

export default {
    props: {
        clients: {},
        fbBills: {},
        refills: {},
    },

    components: {
        AppLayout,
        ApplicationLogo,
        JetButton,
    },

    data() {
        return {
            form: this.$inertia.form({
                filterDate: "",
            }),
        };
    },

    setup(props) {
        const handleBalance = computed(() => {
            const clients = props.clients.data;
            let arrayBalance = [];

            clients.map((client) => {
                if (client.balance >= 0) arrayBalance.push(+client.balance);
            });

            let total = arrayBalance.reduce((a, b) => a + b, 0);

            const rounded = (x) => Number.parseFloat(x.toFixed(2));

            const totalRounded = rounded(total);

            return totalRounded;
        });

        const handleNegativeBalance = computed(() => {
            const clients = props.clients.data;
            let arrayNegativeBalance = [];

            clients.map((client) => {
                if (client.balance <= 0)
                    arrayNegativeBalance.push(+client.balance);
            });

            let total = arrayNegativeBalance.reduce((a, b) => a + b, 0);

            const rounded = (x) => Number.parseFloat(x.toFixed(2));

            const totalRounded = rounded(total);

            return totalRounded;
        });

        const handleInvoiced = computed(() => {
            const fbBills = props.fbBills.data;
            let arrayInvoiced = [];

            fbBills.map((bill) => {
                arrayInvoiced.push(+bill.total);
            });

            let total = arrayInvoiced.reduce((a, b) => a + b, 0);

            const rounded = (x) => Number.parseFloat(x.toFixed(2));

            const totalRounded = rounded(total);

            return totalRounded;
        });

        const handleCommissions = computed(() => {
            const commissions = props.fbBills.data;
            let arrayCommissions = [];

            commissions.map((c) => {
                arrayCommissions.push(+c.commission);
            });

            let total = arrayCommissions.reduce((a, b) => a + b, 0);

            const rounded = (x) => Number.parseFloat(x.toFixed(2));

            const totalRounded = rounded(total);

            return totalRounded;
        });

        const handleDeposits = computed(() => {
            const deposits = props.refills.data;
            let arrayDeposits = [];

            deposits.map((deposit) => {
                arrayDeposits.push(+deposit.total);
            });

            let total = arrayDeposits.reduce((a, b) => a + b, 0);

            const rounded = (x) => Number.parseFloat(x.toFixed(2));

            const totalRounded = rounded(total);

            return totalRounded;
        });

        return {
            handleBalance,
            handleNegativeBalance,
            handleInvoiced,
            handleCommissions,
            handleDeposits,
        };
    },

    methods: {
        handleFilter() {
            this.form.get(route("dashboard"));
        },
    },
};
</script>
