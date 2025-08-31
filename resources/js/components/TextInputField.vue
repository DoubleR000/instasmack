<template>
    <div class="mb-4 rounded-2xl border border-gray-500 pr-5 pb-2 pl-5 hover:border-white">
        <label class="text-sm text-gray-400"><slot /></label>
        <input
            class="h-12 w-full select-none focus:outline-0"
            :type="type ?? 'text'"
            :name="name"
            :value="modelValue"
            @input="$emit('update:modelValue')"
        />
    </div>
</template>

<script lang="ts" setup>
defineProps({
    modelValue: String,
    name: String,
    type: String,
});
</script>
