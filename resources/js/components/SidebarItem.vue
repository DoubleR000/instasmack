<template>
    <div class="pr-10">
        <Link class="h-12 w-full cursor-pointer rounded-md pb-1 text-left text-xl hover:bg-gray-600" :href="href" :method="method" as="button">
            <slot />
        </Link>
    </div>
</template>

<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';

withDefaults(
    defineProps<{
        href: string;
        method?: 'get' | 'post' | 'put' | 'patch' | 'delete';
    }>(),
    {
        method: 'get',
    },
);
</script>
