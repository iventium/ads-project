<template>
    <div>
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-purple-600">
                <tr>
                    <th
                        v-for="(header, index) in headers"
                        :key="`header-${index}`"
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                    >
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
                <slot></slot>

                <tr v-if="items.data.length === 0">
                    <td :colspan="headers.length" class="p-4">
                        No hay datos disponibles
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4" v-if="items.data.length > 0">
            <SimplePagination
                :prevUrl="items.links.prev"
                :nextUrl="items.links.next"
            />
        </div>
    </div>
</template>

<script>
import SimplePagination from "@/Components/SimplePagination.vue";

export default {
    props: {
        headers: {
            type: Array,
            require: true,
        },

        items: {
            type: Object,
            require: true,
        },
    },

    components: {
        SimplePagination,
    },
};
</script>
