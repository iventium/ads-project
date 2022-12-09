<template>
    <div class="flex items-center justify-between">
        <pagination-button
            :href="prevUrl"
            :disabled="!prevUrl"
            :class="{ 'opacity-25': !prevUrl }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                />
            </svg>

            Previous
        </pagination-button>

        <pagination-button
            :href="nextUrl"
            :disabled="!nextUrl"
            :class="{ 'opacity-25': !nextUrl }"
        >
            Next
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                />
            </svg>
        </pagination-button>
    </div>
</template>

<script>
import PaginationButton from "@/Components/Button.vue";

export default {
    props: {
        prevUrl: {},
        nextUrl: {},
    },

    components: {
        PaginationButton,
    },
};
</script>
