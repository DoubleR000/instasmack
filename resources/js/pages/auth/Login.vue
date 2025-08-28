<template>
    <AppLayout>
        <div class="grid h-screen grid-cols-12">
            <div class="col-span-7 flex flex-col items-center justify-center border-r-1 border-gray-600">
                <h1 class="logo text-9xl font-extrabold">InstaSmack</h1>
                <div class="text-lg font-bold">See everyday moments from your close friends.</div>
            </div>

            <div class="col-span-5 flex flex-col justify-center gap-5 p-10">
                <h1 class="text-left text-xl font-bold">Log into InstaSmack</h1>
                <form @submit.prevent="form.post('/login')">
                    <TextInputField v:model="form.email">Email</TextInputField>
                    <TextInputField v:model="form.password">Password</TextInputField>
                    <button :class="loginButtonStyle" type="submit">Log In</button>
                </form>

                <LinkButton :class="forgotPasswordButtonStyle">Forgot Password?</LinkButton>
                <LinkButton :class="registerButtonStyle" :href="route('register')"> Create a New Account </LinkButton>
            </div>
        </div>
    </AppLayout>
</template>

<script lang="ts" setup>
import LinkButton from '@/components/LinkButton.vue';
import TextInputField from '@/components/TextInputField.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const loginButtonStyle = 'h-12 w-full cursor-pointer rounded-4xl bg-blue-500 font-medium font-semibold hover:bg-blue-700';
const registerButtonStyle = 'mt-10 h-12 border-2 bg-white font-semibold text-blue-400 hover:bg-gray-300';
const forgotPasswordButtonStyle = 'h-12 font-semibold hover:bg-gray-500';

const form = useForm({
    email: '',
    password: '',
});
</script>
