<template>
    <MainLayout>
        <template v-slot:mainContent>
            <div class="absolute right-4 w-80">
                <Toast x-data="{shown: false, timeout:null}"
                    x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                    x-show.transition.opacity.out.duration.5000ms="shown" v-if="flashSuccess && isShowFlash" closable
                    type="success">
                    {{ flashSuccess }}
                </Toast>
                <Toast x-data="{shown: false, timeout:null}"
                    x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);"
                    x-show.transition.opacity.out.duration.5000ms="shown" v-if="flashError && isShowFlash" closable
                    type="danger">
                    {{ flashError }}
                </Toast>
            </div>
            <div class="flex flex-col ml-2">
                <div class="flex flex-row align-items-center">
                    <div class="w-full h-full">
                        <h1 class="w-20 text-2xl font-bold text-gray-700">Appointments</h1>
                        <h6 class="h-1 text-xs text-gray-400 ">
                            <a href="/">Home</a> > <a href="/appointment">Appointments</a> > View Appointments
                        </h6>
                    </div>
                    <div class="">
                        <button @click="showModal" type="button" v-if="appointment.status == 'pending'"
                            class="z-50 w-10 h-8 bg-blue-500 rounded-lg hover:bg-blue-700">
                            <editicon class="mx-auto"></editicon>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-10 mt-8 bg-white rounded-xl">
                <div class="flex flex-row gap-96">
                    <div class="flex flex-col">
                        <div>
                            <h2 class="text-xl">Appointment Type</h2>
                            <p class="pb-2 pl-2 text-3xl font-medium">{{ appointment.app_type }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl">Patient Name</h2>
                            <p class="pb-2 pl-2 text-3xl font-medium">{{ appointment.user.name }}</p>
                        </div>
                        <div class="">
                            <h2 class="text-xl">Patient Notes</h2>
                            <p class="pb-2 pl-2 text-2xl font-medium">{{ appointment.pat_notes }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <h2 class="text-xl">Date</h2>
                            <p class="pb-2 pl-2 text-xl font-medium">{{ formatDate(appointment.app_date) }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl">Time</h2>
                            <p class="pb-2 pl-2 text-xl font-medium">{{ formatTime(appointment.app_time) }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl">Status</h2>
                            <p class="pb-2 pl-2 text-xl font-medium capitalize">{{ appointment.status }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl">Assigned Dentist</h2>
                            <p class="pb-2 pl-2 text-xl font-medium capitalize">Dr. {{ appointment.dentist.first_name }} {{
                                appointment.dentist.last_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        <Edit :appointment="appointment" :dentists="dentists" :services="services" @close="closeModal" v-if="isShowModal">
        </Edit>
        </template>
    </MainLayout>
</template>

<script setup>
import editicon from '@/Components/EditIcon.vue';
import Edit from '@/Pages/Patient/Appointment/Edit.vue'
import MainLayout from "@/Pages/Layouts/MainLayout.vue";
import { usePage } from '@inertiajs/vue3';
import { Toast } from 'flowbite-vue';
import moment from "moment";
import "moment-timezone";
import { ref, computed } from 'vue';

const props = defineProps({
    appointment: {
        type: Object
    },
    dentists: Object,
    services: Object
})

const isShowModal = ref(false);

function closeModal() {
    isShowModal.value = false;
}
function showModal() {
    isShowModal.value = true;
}

const isShowFlash = ref(false)

const page = usePage()

const flashSuccess = computed(
    () => page.props.flash.success, isShowFlash.value = true
)

const flashError = computed(
    () => page.props.flash.error, isShowFlash.value = true
)
function formatTime(time) {
    return moment(time, 'HH:mm').format('hh:mm A')
}

const formatDate = (date) => {
    return moment(date, 'YYYY-MM-DD').format('MMMM D, YYYY');
};
</script>