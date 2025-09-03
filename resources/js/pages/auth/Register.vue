<template>
    <AppLayout>
        <div class="overflow-x-auto text-lg">
            <div class="mx-auto mt-30 w-160">
                <h1 class="text-4xl font-medium">Get started on InstaSmack</h1>
                <h4>Sign up to see photos and videos from your friends.</h4>
                <form class="pt-5" @submit.prevent="submitForm">
                    <label class="font-bold" for="email">Email</label>
                    <TextInputField
                        class="mt-2"
                        v-model="registerForm.email"
                        :warning-condition="registerForm.errors.email"
                        @input="registerForm.clearErrors('email')"
                    >
                        Email
                    </TextInputField>
                    <FormErrorMessage :field-error="registerForm.errors.email" />

                    <label class="font-bold" for="password">Password</label>
                    <TextInputField
                        class="mt-2"
                        :type="'password'"
                        v-model="registerForm.password"
                        :warning-condition="registerForm.errors.password"
                        @input="registerForm.clearErrors('password')"
                        >Password</TextInputField
                    >
                    <FormErrorMessage :field-error="registerForm.errors.password" />

                    <label class="font-bold" for="password">Confirm Password</label>
                    <TextInputField class="mt-2" :type="'password'" v-model="registerForm.password_confirmation"> Password </TextInputField>
                    <FormErrorMessage :field-error="registerForm.errors.password_confirmation" />

                    <label class="font-bold">Birthday</label>
                    <div class="mb-4 flex flex-row items-start gap-5">
                        <Dropdown class="flex-1" :options="months" @option-change="(month) => (birthMonth = month)">Month</Dropdown>
                        <Dropdown class="flex-1" :options="daysInMonth" @option-change="(day) => (birthDay = day)">Day</Dropdown>
                        <Dropdown class="flex-1" :options="years" @option-change="(year) => (birthYear = year)">Years</Dropdown>
                    </div>
                    <FormErrorMessage :field-error="registerForm.errors.birthdate" />

                    <label class="font-bold">Name</label>
                    <TextInputField class="mt-2" v-model="registerForm.name">Name</TextInputField>
                    <FormErrorMessage :field-error="registerForm.errors.name" />

                    <label class="font-bold">Username</label>
                    <TextInputField class="mt-2" v-model="registerForm.username">Username</TextInputField>
                    <FormErrorMessage :field-error="registerForm.errors.username" />

                    <button class="mt-5 h-12 w-full cursor-pointer rounded-4xl bg-blue-500 font-semibold hover:bg-blue-700" type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script lang="ts" setup>
import Dropdown from '@/components/Dropdown.vue';
import FormErrorMessage from '@/components/FormErrorMessage.vue';
import TextInputField from '@/components/TextInputField.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

const years = computed(() => {
    const currentYear = new Date().getFullYear();
    const years = [];

    for (let i = 0; i < 120; i++) {
        years.push((currentYear - i).toString());
    }

    return years;
});

const birthMonth = ref();
const birthDay = ref();
const birthYear = ref();

const daysInMonth = ref(getDaysFromMonth());

const birthDate = computed(() => {
    if (!birthMonth.value || !birthYear.value || !birthDay.value) {
        return '';
    }

    const yyyy: string = birthYear.value ? birthYear.value.toString() : '';
    const mm: string = birthMonth.value ? getMonthIndex().toString().padStart(2, '0') : '';
    const dd: string = birthDay.value ? birthDay.value.toString().padStart(2, '0') : '';

    return `${yyyy}-${mm}-${dd}`;
});

const registerForm = useForm({
    email: '',
    password: '',
    password_confirmation: '',
    birthdate: '',
    name: '',
    username: '',
});

watch([birthDay, birthMonth, birthYear], () => {
    daysInMonth.value = getDaysFromMonth();
    console.log(birthDate.value);
});

function submitForm() {
    registerForm.birthdate = birthDate.value;

    if (!registerForm.email) {
        registerForm.setError('email', 'Please enter a valid email address.');
    }

    if (!registerForm.password) {
        registerForm.setError('password', 'Enter a combination of at least six numbers, letters and punctuation marks (like ! and &).');
    }

    if (!registerForm.birthdate) {
        registerForm.setError('birthdate', 'Select your birthday. You can change who can see this later.');
    }

    if (!registerForm.username) {
        registerForm.setError('birthdate', 'Select your birthday. You can change who can see this later.');
    }

    if (registerForm.hasErrors) {
        return;
    }

    registerForm.post('/register');
}

function getMonthIndex() {
    return months.indexOf(birthMonth.value) + 1;
}

function getDaysFromMonth(): string[] {
    const dayArray = [];
    const monthIndex = getMonthIndex();

    let days = 0;

    if (monthIndex) {
        days = new Date(birthYear.value ? Number(birthYear.value) : 2000, monthIndex, 0).getDate();
    } else {
        days = 31;
    }

    for (let day = 1; day <= days; day++) {
        dayArray.push(day.toString());
    }

    return dayArray;
}
</script>
