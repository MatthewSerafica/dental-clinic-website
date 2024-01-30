<template>
    <MainLayout>

        <template v-slot:mainContent>
            <div class="relative flex flex-col">
                <div class="rounded top-16 ">
                    <div class="flex flex-col ml-2 max-sm:px-5">
                        <h1 class="w-full h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">
                            Edit User</h1>
                        <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
                            <a href="/admin">Home</a> > <a href="/admin/users">User</a> > <a>Edit User</a>
                        </h6>
                    </div>
                    <div class="relative laptop:w-[75rem] laptop:h-[36rem] mt-8 desktop:w-[99rem]">
                        <form @submit.prevent="update">
                            <div
                                class="grid desktop:grid-rows-14 bg-[#ffffff] rounded-xl desktop:h-[50rem] desktop:w-[90rem] desktop:px-6 drop-shadow-lg">
                                <div class="grid laptop:grid-cols-8 desktop:col-span-2 desktop:grid-cols-6">
                                    <h1 class="row-start-1 p-6 text-lg font-medium">
                                        EDIT USER
                                    </h1>
                                    <div class="py-4 laptop:col-start-7 desktop:col-start-6 right-2 w-44">
                                        <a href="/admin/users"
                                            class="flex items-center gap-2 px-6 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                            <ArrowLeft />
                                            User List
                                        </a>
                                    </div>
                                    <hr
                                        class="h-0.5 bg-gray-20 border-1 dark:bg-gray-700 desktop:col-span-6 laptop:col-span-8" />
                                </div>

                                <!--Fields-->
                                <div class="row-start-4 px-[3em]">
                                    <div class="row-start-1 py-5">
                                        <h1 class="text-gray-400 ">USER ACCOUNT DETAILS</h1>
                                    </div>

                                    <div class="grid grid-cols-3 left-10 gap-y-5">

                                        <div>

                                            <div for="lname">Name</div>
                                            <input v-if="form.user_type === 'employee' || form.user_type === 'student'"
                                                class="rounded-md textbox laptop:w-80 drop-shadow-lg" v-model="form.name"
                                                type="text" placeholder="Juan dela Cruz" disabled>
                                            <input v-else class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.name" type="text" placeholder="Juan dela Cruz">
                                            <div v-if="form.errors.name" class="text-red-600">
                                                {{ form.errors.name }}
                                            </div>
                                        </div>

                                        <div>
                                            <div>User Type</div>
                                            <input class="capitalize rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                type="text" v-model="form.user_type" disabled />
                                            <div v-if="form.errors.user_type" class="text-red-600">
                                                {{ form.errors.user_type }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 left-10 gap-y-1 pt-[1em]">
                                        <div>
                                            <div>Email</div>
                                            <input class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.email" type="email" />
                                            <div v-if="form.errors.email" class="text-red-600">
                                                {{ form.errors.email }}
                                            </div>
                                        </div>

                                        <div class=" pt-[3em]">

                                            <div class="row-start-1 py-5">
                                                <h1 class="text-gray-400 ">CHANGE PASSWORD</h1>
                                            </div>

                                            <div>Password</div>
                                            <input @keydown.space.prevent
                                                class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.password" type="password" />
                                            <div v-if="form.errors.password" class="text-red-600">
                                                {{ form.errors.password }}
                                            </div>
                                        </div>

                                        <div class=" pt-[1em]">
                                            <div>Confirm Password</div>
                                            <input @keydown.space.prevent
                                                class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.confirmPassword" type="password" />
                                            <div v-if="form.errors.confirmPassword" class="text-red-600">
                                                {{ form.errors.confirmPassword[0] }}
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <!--CTAs-->
                                <div class="flex flex-row justify-end md:w-[72rem] laptop:w-[72rem] lg:w-[85rem] desktop:w-[85rem] gap-2 row-start-10 pb-10">
                                    <div class="justify-stretch">
                                        <button
                                            class="px-4 py-2 font-bold text-white bg-blue-500 rounded laptop:w-40 hover:bg-blue-700"
                                            type="submit" as="button">
                                            Save Changes
                                        </button>
                                    </div>
                                    <div class="">
                                        <button class="px-4 py-2 font-bold text-black bg-gray-200 rounded hover:bg-gray-400"
                                            as="button" onclick="history.back()">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script setup>
import ArrowLeft from '@/Components/ArrowLeft.vue'
import MainLayout from "@/Pages/Layouts/MainLayout.vue"
import { useForm } from "@inertiajs/vue3"
import { watch } from 'vue';

const props = defineProps({
    user_info: Object,
})
const form = useForm({
    name: props.user_info.name,
    user_type: props.user_info.user_type,
    email: props.user_info.email,
    password: "",
    confirmPassword: "",
})

watch(() => form.password, (newPassword) => {
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;

    if (!passwordRegex.test(newPassword)) {
        form.errors.password = "Password must have at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long"
    } else {
        form.errors.password = null
    }
});

const update = () => {
    if (form.password === form.confirmPassword) {
        form.put(route('admin.user.update', props.user_info.id));
    } else {
        form.errors.confirmPassword = ["Password do not match"];
    }
}


</script>
