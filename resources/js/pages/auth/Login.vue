<template>
    <AppLayout>
        <div class="md:grid md:h-screen md:grid-cols-12">
            <div class="col-span-8 hidden flex-col items-center justify-center border-r-1 border-gray-600 md:flex">
                <h1 class="logo font-extrabold md:text-7xl">InstaSmack</h1>
                <div class="text-lg font-bold">See everyday moments from your close friends.</div>
            </div>

            <div class="flex h-screen w-full flex-col justify-center overflow-x-auto text-lg md:col-span-4 md:items-center">
                <div class="mx-auto w-125 gap-5 p-10 md:w-full">
                    <h1 class="logo pb-4 text-center text-3xl font-extrabold md:hidden">InstaSmack</h1>
                    <h1 class="pb-10 text-left font-bold md:text-xl">Log into InstaSmack</h1>
                    <form @submit.prevent="form.post('/login')">
                        <TextInputField v:model="form.email">Email</TextInputField>
                        <TextInputField v:model="form.password">Password</TextInputField>
                        <button class="mt-5 h-12 w-full cursor-pointer rounded-4xl bg-blue-500 font-semibold hover:bg-blue-700" type="submit">
                            Log In
                        </button>
                    </form>

                    <LinkButton class="mt-3 h-12 font-semibold hover:bg-gray-500">Forgot Password?</LinkButton>

                    <LinkButton class="mt-15 h-12 font-semibold text-blue-400 ring-2 hover:bg-gray-500" :href="route('register')">
                        Create a New Account
                    </LinkButton>
                </div>
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
