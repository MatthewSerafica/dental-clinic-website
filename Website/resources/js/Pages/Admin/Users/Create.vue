
<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="relative flex flex-col">
                <div class="rounded top-16 ">
                    <div class="absolute right-0 w-80">
                        <Toast x-data="{shown: false, timeout:null}"
                            x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                            x-show.transition.opacity.out.duration.5000ms="shown" v-if="flashSuccess && isShowFlash"
                            closable type="success">
                            {{ flashSuccess }}
                        </Toast>
                        <Toast x-data="{shown: false, timeout:null}"
                            x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                            x-show.transition.opacity.out.duration.5000ms="shown" v-if="flashError && isShowFlash" closable
                            type="danger">
                            {{ flashError }}
                        </Toast>
                    </div>
                    <div class="flex flex-col ml-2 max-sm:px-5">
                        <h1 class="w-full h-8 text-2xl font-bold text-gray-700 max-sm:ml-4">
                            Create Dentist</h1>
                        <h6 class="h-1 text-xs text-gray-400 max-sm:ml-4">
                            <a href="/admin">Home</a> > <a href="/admin/users">User</a> > <a>Add Dentists</a>
                        </h6>
                    </div>
                    <div class="relative laptop:w-[75rem] laptop:h-[36rem] mt-8 desktop:w-[99rem]">
                        <form @submit.prevent="create">
                            <div
                                class="grid desktop:grid-rows-14 bg-[#ffffff] rounded-xl desktop:h-[50rem] desktop:w-[90rem] desktop:px-6 drop-shadow-lg">
                                <div class="grid laptop:grid-cols-8 desktop:col-span-2 desktop:grid-cols-6">
                                    <h1 class="row-start-1 p-6 font-medium text-l">
                                        ADD DENTIST
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

                                <div class="row-start-3 py-5">
                                    <h1 class="px-6 text-gray-400">BASIC INFORMATION</h1>
                                </div>
                                <!--Fields-->
                                <div class="row-start-4 px-14">
                                    <div class="grid grid-cols-3 left-10 gap-y-4">
                                        <div class="">
                                            <div>User Type</div>
                                            <input class="capitalize rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                type="text" v-model="form.user_type" disabled />
                                        </div>

                                        <div class="row-start-4">
                                            <div for="lname">Last Name <label class=" text-[red]">*</label></div>
                                            <input class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.last_name" type="text" placeholder="dela Cruz" required />
                                            <div v-if="form.errors.last_name" class="text-red-600">
                                                {{ form.errors.last_name }}
                                            </div>
                                        </div>

                                        <div class="row-start-4">
                                            <div for="fname">First Name <label class=" text-[red]">*</label></div>
                                            <input class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.first_name" type="text" placeholder="Juan" required />
                                            <div v-if="form.errors.first_name" class="text-red-600">
                                                {{ form.errors.first_name }}
                                            </div>
                                        </div>

                                        <div class="row-start-4">
                                            <div for="mname">Middle Name </div>
                                            <input class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.middle_name" type="text" placeholder="Bautista" />
                                            <div v-if="form.errors.middle_name" class="text-red-600">
                                                {{ form.errors.middle_name }}
                                            </div>
                                        </div>

                                        <div class="row-start-5">
                                            <div>Email Address <label class=" text-[red]">*</label></div>
                                            <input @keydown.space.prevent class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                                v-model="form.email" type="email" placeholder="jbdelacruz@slu.edu.ph"
                                                required />
                                            <div v-if="form.errors.email" class="text-red-600">
                                                {{ form.errors.email }}
                                            </div>
                                        </div>


                                        <div class="row-start-5">
                                            <div>Contact Number <label class=" text-[red]">*</label></div>
                                            <input @keydown.space.prevent class="rounded-md textbox laptop:w-80 drop-shadow-lg" type="text"
                                                v-model="form.contact_number" placeholder="09123456789" required />
                                            <div v-if="form.errors.contact_number" class="text-red-600">
                                                {{ form.errors.contact_number }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- CREATE PASSWORD -->
                                <div class="row-start-7 pt-2">
                                    <h1 class="px-6 text-gray-400">CREATE PASSWORD</h1>
                                </div>

                                <div class="py-3 pb-10 row-start-8 px-14">
                                    <div>Password <label class=" text-[red]">*</label></div>
                                    <input class="rounded-md textbox laptop:w-80 drop-shadow-lg" v-model="form.password"
                                        type="password" required />
                                    <div v-if="form.errors.password" class="text-red-600">
                                        {{ form.errors.password }}
                                    </div>
                                    <div class="mt-4">Confirm Password <label class=" text-[red]">*</label></div>
                                    <input class="rounded-md textbox laptop:w-80 drop-shadow-lg"
                                        v-model="form.confirmPassword" type="password" required />
                                    <div v-if="form.errors.confirmPassword" class="text-red-600">
                                        {{ form.errors.confirmPassword[0] }}
                                    </div>
                                </div>


                                <!--CTAs-->
                                <div class="grid grid-cols-2 row-start-12 gap-x-2 pb-11">
                                    <div class="col-start-8 justify-stretch">
                                        <button
                                            class="h-10 font-bold text-white bg-blue-500 rounded laptop:w-40 hover:bg-blue-700"
                                            type="submit" as="button">
                                            Save
                                        </button>
                                    </div>
                                    <div class="laptop:col-start-10 desktop:col-start-9">
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
import MainLayout from "@/Pages/Layouts/MainLayout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import ArrowLeft from "@/Components/ArrowLeft.vue";
import { Toast } from 'flowbite-vue'
import Alpine from 'alpinejs'
import { computed, ref, watch } from "vue";

Alpine.start()


const isShowFlash = ref(false)

const page = usePage()

const flashSuccess = computed(
    () => page.props.flash.success, isShowFlash.value = true
)

const flashError = computed(
    () => page.props.flash.error, isShowFlash.value = true
)


const form = useForm({
    dentist_id: null,
    last_name: null,
    first_name: null,
    middle_name: null,
    user_type: 'dentist',
    email: null,
    contact_number: null,
    password: null,
    confirmPassword: null,
});

const create = () => {
    if (form.password !== form.confirmPassword) {
        form.errors.confirmPassword = ["Password do not match"];
    } else {
        form.post(route("admin.dentist.store"));
    }
}

watch(() => form.last_name, (newValue) => {
    form.errors.last_name = !newValue
        ? 'Last name is required'
        : /^\d+$/.test(newValue)
            ? 'Last name should only contain letters'
            : /^\s/.test(newValue)
                ? 'Last name must start with a letter'
                : '';
});

watch(() => form.first_name, (newValue) => {
    form.errors.first_name = !newValue
        ? 'First name is required'
        : /^\d+$/.test(newValue)
            ? 'First name should only contain letters'
            : /^\s/.test(newValue)
                ? 'First name must start with a letter'
                : '';
});

watch(() => form.middle_name, (newValue) => {
    form.errors.middle_name = /^\s/.test(newValue)
        ? 'Middle name must start with a letter'
        : '';
});

watch(() => form.contact_number, (newValue) => {
    form.errors.contact_number = !newValue
        ? 'Contact Number is required'
        : !/^[09]\d{10}$/.test(newValue)
            ? 'Contact number should start with 09 and be exactly 11 digits'
            : /^\D+$/.test(newValue)
                ? 'Contact number should only contain numbers'
                : '';
});
</script>
