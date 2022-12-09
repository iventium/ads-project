<template>
    <textarea
        rows="10"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    ></textarea>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["modelValue"],
});
</script>
