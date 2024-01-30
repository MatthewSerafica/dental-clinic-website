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
                Login to Your Account
            </div>
            <form @submit.prevent="login" class="flex flex-col items-center w-full space-y-3">
                <div class="mt-3 w-full max-w-[500px] flex flex-col space-y-2">
                    <div class="relative flex items-center px-2 bg-white focus-within:border-blue-900">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-500 bg-white border-t border-b border-l border-gray-300 shadow-sm rounded-l-md">
                            <svg width="15" height="48" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <TextInput @keydown.space.prevent placeholder="Email" class="w-full p-3 rounded-l-none rounded-r-lg focus:outline-none"
                            v-model="form.email" type="email" />
                    </div>
                    <span v-if="form.errors.email" class="flex items-center px-2 mt-1 ml-1 tracking-wide text-red-500">
                        {{ form.errors.email }}</span>
                    <div class="inline-flex items-center px-2 bg-white focus-within:border-blue-900">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-500 bg-white border-t border-b border-l border-gray-300 shadow-sm rounded-l-md">
                            <svg width="15" height="48" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <TextInput placeholder="Password" class="w-full p-3 rounded-l-none rounded-r-lg focus:outline-none"
                            v-model="form.password" type="password" />
                    </div>
                    <span v-if="form.errors.password" class="flex items-center px-2 mt-1 ml-1 tracking-wide text-red-500">
                        {{ form.errors.password }}
                    </span>
                    <div
                        class="px-4 font-poppins text-sm min-w-[107px] whitespace-nowrap text-blue-800 text-opacity-100 leading-none font-normal">
                        <Link :href="route('password.index')">
                        Forgot password?
                        </Link>
                    </div>
                    <div class="inline-flex items-center px-2 bg-white focus-within:border-blue-900">
                        <button class="w-full px-5 py-2 mt-3 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                            type="submit">
                            Login
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
import TextInput from '@/Components/TextInput.vue'
import { useForm, Link } from '@inertiajs/vue3'


const form = useForm({
    email: '',
    password: '',
})
const login = () => form.post(route("login.store"));

</script>
