<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('refills.index')">Recargas</Link>
                <span class="mx-3">&gt;</span>
                <span class="text-gray-500">#{{ refill.data.id }}</span>
            </h2>
        </template>
        <container>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-2xl font-medium leading-6 text-gray-900">
                        {{ refill.data.clients.business }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-gray-500 text-sm">
                        {{ refill.data.clients.owner }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Pago</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.payment }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Banco</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.bank }}
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Fecha de realización
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.date }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Referencia
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.reference }}
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Tasa del dia
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.rate }} bs
                            </dd>
                        </div>
                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Total en dólares
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.total }} $
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">
                                Comentarios
                            </dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ refill.data.comments }}
                            </dd>
                        </div>

                        <div
                            class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Archivos</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                <ul
                                    role="list"
                                    class="divide-y divide-gray-200 rounded-md border border-gray-200"
                                >
                                    <li
                                        class="flex items-center justify-between py-3 pl-3 pr-4"
                                    >
                                        <div
                                            class="flex w-0 flex-1 items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-5 w-5 flex-shrink-0 text-gray-400"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"
                                                />
                                            </svg>

                                            <span
                                                class="ml-2 w-0 flex-1 truncate"
                                                >factura_{{
                                                    refill.data.clients
                                                        .business
                                                }}_{{
                                                    refill.data.date
                                                }}.pdf</span
                                            >
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <button
                                                href="#"
                                                class="font-medium text-purple-600 hover:text-purple-500"
                                                :onClick="exportPDF"
                                            >
                                                Descargar
                                            </button>
                                        </div>
                                    </li>
                                </ul>
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
import { logoBase64 } from "../../Components/LogoBase64";

import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;

import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card.vue";

export default {
    props: {
        refill: {},
    },

    components: {
        AppLayout,
        Container,
        Card,
        Link,
    },

    methods: {
        exportPDF() {
            // console.log(this.refill.data);
            let docDefinition = {
                content: [
                    {
                        image: "logo",
                        width: 350,
                    },
                    // Primera fila,
                    {
                        margin: [0, 40, 0, 0],
                        columns: [
                            {
                                // auto-sized columns have their widths based on their content
                                width: "55%",
                                text: "Iventium LLC EIN: 86-3682860\n\n Sand Lakes Road, Suite A-120, Orlando FL,\n ZC 32809\n\n Telf: +1 (407) 288.22.74 Web Site: iventium.com",
                                style: "subheader",
                            },
                            {
                                // % width
                                width: "40%",
                                table: {
                                    body: [
                                        [
                                            {
                                                text: "000000000000",
                                                alignment: "center",
                                                color: "white",
                                            },
                                            { text: "M", alignment: "center" },
                                            { text: "D", alignment: "center" },
                                            { text: "Y", alignment: "center" },
                                        ],
                                        [
                                            "Orlando",
                                            { text: "000000", color: "white" },
                                            { text: "000000", color: "white" },
                                            { text: "000000", color: "white" },
                                        ],
                                    ],
                                },
                                style: "tableExample",
                            },
                        ],
                        // optional space between columns
                        columnGap: 10,
                    },

                    // Segunda fila
                    {
                        text: "Recibo Digital: ",
                        style: "subheader",
                        margin: [0, 70, 0, 5],
                    },
                    {
                        table: {
                            body: [
                                [
                                    {
                                        text: "Nombre o razon social",
                                        alignment: "center",
                                    },
                                    {
                                        text: this.refill.data.clients.owner,
                                        colSpan: 2,
                                    },
                                    "",
                                ],
                                [
                                    { text: "Dirección", alignment: "center" },
                                    {
                                        text: this.refill.data.clients.address,
                                        colSpan: 2,
                                    },
                                    "",
                                ],
                                [
                                    {
                                        text: "0000000000000000000000000000000",
                                        alignment: "center",
                                        color: "white",
                                    },
                                    {
                                        text: `Tel: ${this.refill.data.clients.phone}`,
                                    },
                                    { text: "Cond. de Pago: Contado" },
                                ],
                            ],
                        },
                    },

                    //Tercera fila
                    { text: "\n\n" },
                    {
                        columns: [
                            {
                                width: "50%",
                                text: "Recarga de saldo",
                            },
                            {
                                width: "50%",
                                text: this.refill.data.payment,
                                alignment: "right",
                            },
                        ],
                    },

                    //Cuarto fila
                    { text: "\n\n" },
                    {
                        columns: [
                            {
                                width: "50%",
                                margin: [0, 200, 0, 0],
                                table: {
                                    body: [
                                        [
                                            {
                                                text: "Banco",
                                                alignment: "center",
                                            },
                                            {
                                                text: this.refill.data.bank,
                                                alignment: "center",
                                            },
                                        ],
                                        [
                                            {
                                                text: "Monto",
                                                alignment: "center",
                                            },
                                            {
                                                text: this.refill.data.payment,
                                                alignment: "center",
                                            },
                                        ],
                                        [
                                            {
                                                text: "Fecha",
                                                alignment: "center",
                                            },
                                            {
                                                text: this.refill.data.date,
                                                alignment: "center",
                                            },
                                        ],
                                        [
                                            {
                                                text: "Tasa del dia",
                                                alignment: "center",
                                            },
                                            {
                                                text: this.refill.data.rate,
                                                alignment: "center",
                                            },
                                        ],
                                        [
                                            {
                                                text: "Total",
                                                alignment: "center",
                                            },
                                            {
                                                text: this.refill.data.total,
                                                alignment: "center",
                                            },
                                        ],
                                        [
                                            {
                                                text: "0000000000000000000000",
                                                color: "white",
                                                border: [
                                                    false,
                                                    false,
                                                    false,
                                                    false,
                                                ],
                                            },
                                            {
                                                text: "000000000000000",
                                                color: "white",
                                                border: [
                                                    false,
                                                    false,
                                                    false,
                                                    false,
                                                ],
                                            },
                                        ],
                                    ],
                                },
                            },
                            {
                                columns: [
                                    {
                                        width: "70%",
                                        text: "Total en USD Americanos",
                                        margin: [0, 280, 0, 0],
                                        alignment: "center",
                                    },
                                    {
                                        width: "30%",
                                        text: this.refill.data.total,
                                        margin: [0, 280, 0, 0],
                                        alignment: "center",
                                    },
                                ],
                            },
                        ],
                    },
                ],

                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                    },
                    subheader: {
                        fontSize: 11,
                        bold: true,
                    },
                    quote: {
                        italics: true,
                    },
                    small: {
                        fontSize: 8,
                    },
                },

                images: {
                    logo: logoBase64,
                },
            };
            const pdf = pdfMake.createPdf(docDefinition);
            pdf.open();
        },
    },
};
</script>

<style></style>
