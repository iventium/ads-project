<template>
    <div>
        <button @click.prevent="show = true">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 hover:text-red-600"
                fill="none"
                viewbox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
            </svg>
        </button>

        <jet-confirmation-modal :show="show">
            <template #title>
                <div>Eliminar {{ modulName }}</div>
            </template>

            <template #content>
                <div>Estas segura de eliminar este {{ modulName }}?</div>
            </template>

            <template #footer>
                <jet-secondary-button @click.prevent="show = false"
                    >Cancelar</jet-secondary-button
                >

                <jet-danger-button
                    class="ml-2"
                    @click="deleteItem"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Eliminar
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </div>
</template>

<script>
import JetConfirmationModal from "@/Components/ConfirmationModal.vue";
import JetDangerButton from "@/Components/DangerButton.vue";
import JetSecondaryButton from "@/Components/SecondaryButton.vue";

export default {
    props: {
        url: {
            require: true,
            type: String,
        },
        modulName: {
            require: true,
            type: String,
        },
    },

    data() {
        return {
            show: false,

            form: this.$inertia.form({}),
        };
    },

    components: {
        JetConfirmationModal,
        JetDangerButton,
        JetSecondaryButton,
    },

    methods: {
        deleteItem() {
            this.form.delete(this.url);
        },
    },
};
</script>
