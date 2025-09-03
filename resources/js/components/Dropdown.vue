<template>
    <div class="relative mt-2 inline-block" ref="optionList">
        <button
            type="button"
            class="flex w-full cursor-pointer flex-col rounded-2xl border border-gray-500 pr-3 pl-5 hover:border-white"
            @click="isOpen = !isOpen"
        >
            <div class="pt-1 pb-0 text-left text-sm text-gray-400"><slot /></div>
            <div class="selected-value flex h-15 items-center">
                <span class="overflow-hidden">{{ selected }}</span>
                <chevron-down class="ml-auto" :size="24"></chevron-down>
            </div>
        </button>
        <div
            class="absolute z-10 mt-1 h-100 w-full space-y-3 overflow-y-scroll rounded-xl border bg-black pt-2 pl-2 shadow-[0_0_15px_1px] shadow-gray-600"
            v-if="isOpen"
        >
            <div class="m-0 cursor-pointer pr-3 pb-2 pl-3" v-for="option in options" :key="option" @click="selectOption(option)">
                {{ option }}
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { onClickOutside } from '@vueuse/core';
import { ChevronDown } from 'lucide-vue-next';
import { ref } from 'vue';

defineProps({
    options: {
        type: Array as () => string[],
        required: true,
    },
    modelValue: [String, Number],
    defaultValue: String,
});

const isOpen = ref(false);
const optionList = ref(null);
const selected = ref('');

const emit = defineEmits(['option-change']);

onClickOutside(optionList, () => (isOpen.value = false));

function selectOption(option: string) {
    selected.value = option;
    isOpen.value = false;
    emit('option-change', option);
}
</script>
