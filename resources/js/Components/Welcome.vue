<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <ApplicationLogo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Aplicación de Administración Iventium ADS
            </div>

            <!-- <div class="mt-6 text-gray-500">
                Laravel Jetstream provides a beautiful, robust starting point
                for your next Laravel application. Laravel is designed to help
                you build your application using a development environment that
                is simple, powerful, and enjoyable. We believe you should love
                expressing your creativity through programming, so we have spent
                time carefully crafting the Laravel ecosystem to be a breath of
                fresh air. We hope you love it.
            </div> -->
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
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
                        <h2>Depósitos</h2>
                    </div>
                </div>

                <div class="ml-12">
                    <h3 class="mt-2 text-5xl font-semibold text-purple-600">
                        $ 14.758,61
                    </h3>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
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
                        <h2>Facturado (Inversión)</h2>
                    </div>
                </div>

                <div class="ml-12">
                    <h3 class="mt-2 text-5xl font-semibold text-teal-400">
                        $ 11.828,09
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
                        <h2>Comisiones Generadas</h2>
                    </div>
                </div>

                <div class="ml-12">
                    <h3 class="mt-2 text-5xl font-semibold text-cyan-400">
                        $ 2.181,61
                    </h3>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
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
                        <h2>Saldos Disponibles</h2>
                    </div>
                </div>

                <div class="ml-12">
                    <h3 class="mt-2 text-5xl font-semibold text-fuchsia-500">
                        $ 689,09
                    </h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>
