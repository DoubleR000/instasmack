<template>
    <div :class="fieldClasses">
        <label :class="labelClasses"><slot /></label>
        <input class="h-12 w-full select-none focus:outline-0" :type="type ?? 'text'" v-model="modelValue" />
    </div>
</template>

<script lang="ts" setup>
import { computed } from 'vue';

const props = defineProps({
    type: String,
    warningCondition: String,
});

const fieldClasses = computed(() => [
    props.warningCondition ? 'border-red-400' : 'border-gray-500 hover:border-white',
    'mb-4 rounded-2xl border  pr-5 pb-2 pl-5',
]);

const labelClasses = computed(() => [props.warningCondition ? 'text-red-400' : 'text-gray-400', 'text-sm']);

const modelValue = defineModel();
</script>
