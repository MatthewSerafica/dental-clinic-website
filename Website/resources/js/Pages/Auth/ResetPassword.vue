<template>
    <div class="relative max-w-screen-[1920px] mx-auto h-screen">
        <div
            class="gap-2.5 absolute z-20 flex flex-col justify-start items-center md:items-center pt-10 md:pt-40 md: w-full md:w-[960px] h-full shadow-lg bg-white lg:rounded-tr-[25px] lg:rounded-br-[25px] sm:rounded-none">
            <div>
                <img class="w-full h-[10rem] object-scale-down" src="../../../../public/images/dc_logo.png"
                    alt="Image Asset 1" />
            </div>
            <div
                class="text-xl font-medium leading-none text-gray-700 text-opacity-100 mt-7 font-poppins whitespace-nowrap">
                Forgot Password
            </div>
            <form @submit.prevent="reset" class="flex flex-col items-center w-full space-y-3">
                <div class="mt-3 w-full max-w-[500px] flex flex-col space-y-2">
                    <div class="inline-flex items-center px-2 bg-white focus-within:border-blue-900">
                        <TextInput placeholder="Password" class="w-full p-3 rounded-full focus:outline-none"
                            v-model="form.password" type="password" />
                    </div>
                    <span v-if="form.errors.password" class="flex items-center px-2 mt-1 ml-1 tracking-wide text-red-500">
                        {{ form.errors.password }}
                    </span>
                    <div class="inline-flex items-center px-2 bg-white focus-within:border-blue-900">
                        <TextInput placeholder="Confirm Password" class="w-full p-3 rounded-full focus:outline-none"
                            v-model="form.confirmPassword" type="password" />
                    </div>
                    <span v-if="form.errors.confirmPassword"
                        class="flex items-center px-2 mt-1 ml-1 tracking-wide text-red-500">
                        {{ form.errors.confirmPassword }}
                    </span>
                    <div class="inline-flex items-center px-2 bg-white focus-within:border-blue-900">
                        <button class="w-full px-5 py-2 mt-3 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                            type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <img class="absolute left-0 z-10 object-cover w-full h-full" src="../../../../public/images/dental_clinic_pic.jpg"
            alt="Image Asset 2" />
    </div>
</template>

<script setup>
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps ({
    email: String,
    token: String,
});

const form = useForm({
    email: props.email,
    token: props.token,
    password: '',
    confirmPassword: '',
});

const reset = () => {
    if (form.password === form.confirmPassword) {
        form.post(route('password.update'));
    } else {
        form.errors.confirmPassword = "Passwords do not match";
    }
};
</script>
