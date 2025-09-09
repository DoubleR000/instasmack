<template>
    <div class="mb-10 w-125 border-b border-gray-700 pb-5" v-if="postData">
        <div class="font-bold">{{ postData.title }}</div>
        <div v-for="media in postData.media" :key="media"><img :src="media.path" alt="" /></div>
    </div>
</template>

<script lang="ts" setup>
defineProps({
    postData: Object,
});
</script>
