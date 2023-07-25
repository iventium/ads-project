<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <Link :href="route('bills.index')">Recibos de campañas</Link>
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
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
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
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
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
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
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

                        <div
                            class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                        >
                            <dt class="font-medium text-gray-500">Nota</dt>
                            <dd
                                class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0"
                            >
                                {{ bill.data.nota }}
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
                                                >factura_campaña_{{
                                                    bill.data.clients.business
                                                }}_{{
                                                    bill.data.ends_at
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

// var pdfMake = require("pdfmake/build/pdfmake.js");
// var pdfFonts = require("pdfmake/build/vfs_fonts.js");
// pdfMake.vfs = pdfFonts.pdfMake.vfs;

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

    methods: {
        exportPDF() {
            const BILL_NUM = this.bill.data.id;
            let bill_id = "";
            if (BILL_NUM < 10) {
                bill_id = `00000${BILL_NUM}`;
            } else if (BILL_NUM >= 10 && BILL_NUM < 100) {
                bill_id = `0000${BILL_NUM}`;
            } else if (BILL_NUM >= 100 && BILL_NUM < 1000) {
                bill_id = `000${BILL_NUM}`;
            }
            // console.log(this.bill.data);
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
                        text: `Recibo Digital: ${bill_id}`,
                        style: "subheader",
                        margin: [0, 70, 0, 5],
                    },
                    {
                        table: {
                            body: [
                                [
                                    {
                                        text: "Nombre o razón social",
                                        alignment: "center",
                                    },
                                    {
                                        text: this.bill.data.clients.owner,
                                        colSpan: 2,
                                    },
                                    "",
                                ],
                                [
                                    { text: "Dirección", alignment: "center" },
                                    {
                                        text: this.bill.data.clients.address,
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
                                        text: `Tel: ${this.bill.data.clients.phone}`,
                                    },
                                    { text: "Cond. de Pago: Contado" },
                                ],
                            ],
                        },
                    },

                    //Tercera fila
                    { text: "\n\n\n" },
                    {
                        columns: [
                            {
                                width: "50%",
                                text: `Campaña Ads ${this.bill.data.investment_per_day}$ diarios por ${this.bill.data.days} dias`,
                            },
                            {
                                width: "50%",
                                text: this.bill.data.invoiced,
                                alignment: "right",
                            },
                        ],
                    },
                    { text: this.bill.data.promotion_link },

                    //Cuarto fila
                    { text: "\n\n Fecha de campaña" },
                    {
                        text: `${this.bill.data.start_at} / ${this.bill.data.ends_at}`,
                    },

                    //Quinta fila
                    { text: "\n\n\n" },
                    {
                        columns: [
                            {
                                width: "50%",
                                text: "Comisión",
                            },
                            {
                                width: "50%",
                                text: this.bill.data.commission,
                                alignment: "right",
                            },
                        ],
                    },

                    //Sexta fila
                    { text: "\n\n\n" },
                    {
                        columns: [
                            {
                                width: "50%",
                                text: "Total en USD Americanos",
                            },
                            {
                                width: "50%",
                                text: this.bill.data.total,
                                alignment: "right",
                            },
                        ],
                    },

                    //Séptima fila
                    //   {text: '\n\n'},
                    {
                        columns: [
                            {
                                width: "100%",
                                margin: [0, 85, 0, 0],
                                table: {
                                    body: [
                                        [
                                            {
                                                text: "Nota:",
                                                alignment: "left",
                                                colSpan: 2,
                                                margin: 10,
                                            },
                                            { text: "000000", color: "white" },
                                        ],
                                        [
                                            {
                                                text: "000000000000000000000000000000000000000000000000000000000000",
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
