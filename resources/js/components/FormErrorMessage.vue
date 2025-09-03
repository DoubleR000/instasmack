<template>
    <div class="mb-2 text-sm text-red-400" v-if="message">
        <circle-alert class="mr-1 inline pb-1" :size="24" />
        {{ message }}
    </div>
</template>

<script setup lang="ts">
import { CircleAlert } from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps({
    fieldError: Array,
});

const message = computed(() => {
    if (!props.fieldError) {
        return undefined;
    }

    for (const item of props.fieldError) {
        if (item !== undefined) {
            return item;
        }
    }

    return undefined;
});
</script>
