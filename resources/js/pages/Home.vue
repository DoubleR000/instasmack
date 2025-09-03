<template>
    <AppLayout>
        <Sidebar>
            <SidebarItem :href="route('home')">Home</SidebarItem>
            <SidebarItem :href="route('posts.create')">Create a Post</SidebarItem>
            <SidebarItem :href="route('logout')" :method="'post'">Logout</SidebarItem>
        </Sidebar>
        <div class="flex flex-col items-center pt-10 text-center">
            <Post :post-data="post" v-for="post in posts" :key="post.id" />
        </div>
    </AppLayout>
</template>

<script lang="ts" setup>
import Post from '@/components/Post.vue';
import Sidebar from '@/components/Sidebar.vue';
import SidebarItem from '@/components/SidebarItem.vue';
import AppLayout from '@/layouts/AppLayout.vue';

defineProps({
    posts: Object,
});
</script>
