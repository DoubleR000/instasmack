<template>
    <AppLayout>
        <div class="md:grid md:h-screen md:grid-cols-12">
            <div class="col-span-7 hidden flex-col items-center justify-center border-r-1 border-gray-600 md:flex">
                <h1 class="logo font-extrabold md:text-7xl xl:text-9xl">InstaSmack</h1>
                <div class="text-lg font-bold">See everyday moments from your close friends.</div>
            </div>

            <div class="col-span-5 flex flex-col justify-center gap-5 p-10">
                <h1 class="logo text-center text-2xl font-extrabold md:hidden">InstaSmack</h1>
                <h1 class="text-left font-bold md:text-xl">Log into InstaSmack</h1>
                <form @submit.prevent="form.post('/login')">
                    <TextInputField v:model="form.email">Email</TextInputField>
                    <TextInputField v:model="form.password">Password</TextInputField>
                    <button class="h-12 w-full cursor-pointer rounded-4xl bg-blue-500 font-semibold hover:bg-blue-700" type="submit">Log In</button>
                </form>

                <LinkButton class="h-12 font-semibold hover:bg-gray-500">Forgot Password?</LinkButton>

                <LinkButton class="mt-10 h-12 font-semibold text-blue-400 ring-2 hover:bg-gray-500" :href="route('register')">
                    Create a New Account
                </LinkButton>
            </div>
        </div>
    </AppLayout>
</template>

<script lang="ts" setup>
import LinkButton from '@/components/LinkButton.vue';
import TextInputField from '@/components/TextInputField.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});
</script>
