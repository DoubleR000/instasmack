<template>
    <div class="mb-2 text-sm text-red-400" v-if="fieldError"><circle-alert class="mr-1 inline pb-1" :size="24"></circle-alert>{{ fieldError }}</div>
</template>

<script setup lang="ts">
import { CircleAlert } from 'lucide-vue-next';

defineProps({
    fieldError: String,
});
</script>
