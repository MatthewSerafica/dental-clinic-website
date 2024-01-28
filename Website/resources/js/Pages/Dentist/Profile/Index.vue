<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="flex flex-col ml-2">
                <h1 class="w-20 h-8 text-2xl font-bold text-gray-700">Profile</h1>
                <h6 class="h-1 text-xs text-gray-400">
                    <a href="/">Home</a> > Profile
                </h6>
            </div>
            <div class="flex flex-col flex-grow mt-8 bg-white rounded-xl">
                <div class="flex flex-col rounded-xl drop-shadow-lg">
                    <div class="">
                        <h1 class="px-8 py-4 text-xl font-bold">
                            EDIT PROFILE
                        </h1>
                        <hr class="h-0.5 bg-gray-20 border-1 dark:bg-gray-700 desktop:col-span-6 laptop:col-span-8" />
                    </div>
                </div>
                <form @submit.prevent="update">
                    <!--student info-->


                    <!--Fields-->
                    <div class="flex flex-col mt-10 ml-10">
                        <div class="flex flex-col gap-5 left-10">
                            <div class="pt-5 pb-2">
                                <h1 class="text-gray-400 ">USER ACCOUNT DETAILS</h1>
                            </div>

                            <div class="flex flex-row gap-5 left-10 max-md:flex-col">
                                <div>
                                    <label class="block font-semibold after:whitespace-nowrap">Name</label>
                                    <input class="rounded-md textbox laptop:w-80 drop-shadow-lg" v-model="form.name"
                                        type="text" placeholder="Juan dela Cruz" disabled>
                                    <div v-if="form.errors.name" class="text-red-600">
                                        {{ form.errors.name }}
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-semibold after:whitespace-nowrap">User Type</label>
                                    <input class="capitalize rounded-md textbox laptop:w-80 drop-shadow-lg" type="text"
                                        v-model="form.user_type" disabled />
                                    <div v-if="form.errors.user_type" class="text-red-600">
                                        {{ form.errors.user_type }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col pt-4 left-10">
                            <div>
                                <label class="block font-semibold after:whitespace-nowrap">Email</label>
                                <input class="rounded-md textbox laptop:w-80 drop-shadow-lg" v-model="form.email"
                                    type="email" />
                                <div v-if="form.errors.email" class="text-red-600">
                                    {{ form.errors.email }}
                                </div>
                            </div>

                            <div class="pt-12">
                                <h1 class="text-gray-400 ">CHANGE PASSWORD</h1>
                            </div>
                            <div class="flex flex-row gap-5 pt-2 max-md:flex-col">
                                <div>
                                    <label class="block font-semibold after:whitespace-nowrap">Password</label>
                                    <input class="rounded-md textbox laptop:w-80 drop-shadow-lg" v-model="form.password"
                                        type="password" />
                                    <div v-if="form.errors.password" class="text-red-600">
                                        {{ form.errors.password }}
                                    </div>
                                </div>

                                <div class="">
                                    <label class="block font-semibold after:whitespace-nowrap">Confirm Password</label>
                                    <input class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                        v-model="form.confirmPassword" type="password" />
                                    <div v-if="form.errors.confirmPassword" class="text-red-600">
                                        {{ form.errors.confirmPassword[0] }}
                                    </div>
                                </div>
                            </div>

                            <!--CTAs-->
                            <div class="flex flex-row gap-4 mt-10 pl-96 max-md:flex-col-reverse max-md:pl-0 max-md:mb-10">
                                <div class="">
                                    <button class="max-md:w-[25rem] px-4 py-2 font-bold text-black bg-gray-200 rounded hover:bg-gray-400"
                                        as="button" onclick="history.back()">
                                        Cancel
                                    </button>
                                </div>
                                <div class="">
                                    <button
                                        class="max-md:w-[25rem] px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                        type="submit" as="button">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </template>
    </MainLayout>
</template>
<script setup>
import ArrowLeft from '@/Components/ArrowLeft.vue'
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import { useForm } from "@inertiajs/vue3"

const props = defineProps({
    nuser: Object,
    student: Object,
})
const form = useForm({
    name: props.nuser.name,
    user_type: props.nuser.user_type,
    email: props.nuser.email,
    password: "",
    confirmPassword: "",
})

const update = () => {
    if (!form.password && !form.confirmPassword) {
        form.password = null;
        form.confirmPassword = null;
        form.put(route('profile.update', props.nuser.id), {
            preserveScroll: false,
            preserveState: false,
            only: ['name', 'user_type', 'email']
        });
    } else if (form.password === form.confirmPassword) {
        form.put(route('profile.update', props.nuser.id));
    } else {
        form.errors.confirmPassword = ["Password do not match"];
    }
}
</script>
