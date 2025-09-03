<template>
  <div class="border-b pb-5 w-125 mb-10" v-if="postData">
    <div class="font-bold">{{ postData.title }}</div>
    <div>{{ postData.content }}</div>
  </div>
</template>

<script lang="ts" setup>
defineProps({
  postData: Object,
});
</script>