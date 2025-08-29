<template>
    <Link class="flex cursor-pointer flex-col items-center justify-center rounded-4xl text-center" :href="href">
        <div>
            <slot />
        </div>
    </Link>
</template>
<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
});
</script>
