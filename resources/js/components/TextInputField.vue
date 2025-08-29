<template>
    <div class="mb-4 rounded-2xl border border-gray-500 pr-5 pb-2 pl-5 hover:border-white">
        <label class="text-sm text-gray-400"><slot /></label>
        <input class="w-full select-none focus:outline-0" type="text" :name="name" :value="modelValue" @input="$emit('update:modelValue')" />
    </div>
</template>

<script lang="ts" setup>
defineProps({
    modelValue: String,
    name: String,
});
</script>
