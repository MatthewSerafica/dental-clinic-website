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
                Your request has been confirmed
            </div>
            <p class="justify-center text-center text-gray-500">If your email address exists in our database, <br>you will
                receive a password recovery link
                at your email address
                in a few minutes</p>
            <div class="mt-2 w-full max-w-[500px] flex flex-col">
                <div class="inline-flex items-center px-2 text-center bg-white focus-within:border-blue-900">
                    <Link :href='route("login")'
                        class="items-center w-full px-5 py-2 mt-3 font-bold text-center text-white bg-blue-500 rounded hover:bg-blue-700">
                    Login Page
                    </Link>
                </div>
            </div>
        </div>
        <img class="absolute left-0 z-10 object-cover w-full h-full" src="../../../../public/images/dental_clinic_pic.jpg"
            alt="Image Asset 2" />
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>
