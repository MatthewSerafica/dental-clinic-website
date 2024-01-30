<template>
    <form @submit.prevent="create">
        <Modal size="6xl" @close="closeModal">
            <template #header>
                <div class="items-center px-4">
                    <h1 class="text-xl font-semibold text-gray-800 ">
                        Book An Appointment
                    </h1>
                </div>
            </template>

            <template #body>
                <div class="p-2">
                    <div class="flex flex-row gap-12 max-md:flex-col">
                        <!-- Left Column -->
                        <div class="w-[25rem]">
                            <div class="w-[25rem] mb-4">
                                <label for="patientId" class="block font-semibold">ID Number</label>
                                <input id="patientId" v-model="idNumber" type="text"
                                    class="w-full px-3 py-2 rounded-md drop-shadow-lg" placeholder="Enter ID Number" disabled>
                            </div>

                            <div class="w-[25rem] mb-4">
                                <label for="patientName" class="block font-semibold">Patient Name</label>
                                <input id="patientName" type="text" v-model="fullName"
                                    class="w-full px-3 py-2 rounded-md drop-shadow-lg" placeholder="Patient Name" disabled>
                            </div>

                            <div class="mb-4 w-[25rem]">
                                <label for="dentist" class="block font-semibold">Dentist</label>
                                <select id="dentist" v-model.number="form.dentist_id"
                                    class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg">
                                    <option disabled value="">
                                        Please select a dentist
                                    </option>
                                    <option v-for="dentist in dentists" :value="dentist.dentist_id">
                                        Dr. {{ dentist.first_name }} {{ dentist.last_name }} </option>
                                </select>
                                <div v-if="form.errors.dentist_id" class="text-red-600">
                                    {{ form.errors.dentist_id }}
                                </div>
                            </div>
                            
                            <div class="mb-4 w-[25rem]">
                                <label for="appointmentType" class="block font-semibold">Appointment Type</label>
                                <select id="appointmentType" v-model="form.app_type"
                                    class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg">
                                    <option value="" disabled selected>
                                        Please select one </option>
                                    <option v-for="service in services" :value=service.services> {{ service.services }}
                                    </option>
                                </select>
                                <div v-if="form.errors.app_type" class="text-red-600">
                                    {{ form.errors.app_type }}
                                </div>
                            </div>

                            <div class="w-[25rem] mb-4">
                                <label for="appointmentDate" class="block font-semibold">Appointment Date</label>
                                <VDatePicker id="appointmentDate" v-model.string="form.app_date" :input-debounce="500"
                                    :disabled-dates="disabledDates" :min-date="new Date()"
                                    :max-date="new Date().setDate(new Date().getDate() + 6)"
                                    :masks="masks">
                                    <template #default="{ togglePopover, inputValue }">
                                        <input :value="inputValue" 
                                            class="border border-black w-[25rem] px-3 py-2 rounded-md drop-shadow-lg"
                                            placeholder="Select Appointment Date" @click="togglePopover">
                                    </template>
                                </VDatePicker>
                            </div>


                            <div class="mb-4 w-[25rem]">
                                <label for="appointmentDescription" class="block font-semibold">Appointment
                                    Description</label>
                                <textarea id="appointmentDescription" class="w-full px-3 py-2 rounded-md drop-shadow-lg"
                                    v-model="form.pat_notes" placeholder="Enter Appointment Description"></textarea>
                                <div v-if="form.errors.pat_notes" class="text-red-600">
                                    {{ form.errors.pat_notes }}
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="">
                            <h2 v-if="form.dentist_id" class="mb-2 text-lg font-semibold text-center">Morning Session</h2>
                            <div class="grid grid-cols-5 gap-4 mb-4">
                                <div v-for="available in availableTime.morning">
                                    <Button v-if="!available.isBooked"
                                        @click="setTime(available.time, available.times_id)" type="button"
                                        as="button"
                                        class="px-4 py-4 border-2 focus:bg-blue-800 focus:border-blue-800 focus:ring-blue-800 focus:text-white active:bg-blue-800 active:border-blue-800 active:ring-blue-800"
                                        outline>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                    <Button v-else @click="setTime(available.time, available.times_id)" type="button"
                                        as="button" class="px-4 py-4 border-2 border-red-600" color="red" disabled>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                </div>
                            </div>

                            <h2 v-if="form.dentist_id" class="mb-2 text-lg font-semibold text-center">Afternoon Session</h2>
                            <div class="grid grid-cols-5 gap-4">
                                <div v-for="available in availableTime.afternoon">
                                    <Button v-if="!available.isBooked"
                                        @click="setTime(available.time, available.times_id)" type="button"
                                        as="button" class="px-4 py-4 border-2 " outline>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                    <Button v-else @click="setTime(available.time, available.times_id)" type="button"
                                        as="button" class="px-4 py-4 border-2 border-red-600" color="red" disabled>
                                        <p class="text-base">
                                            {{ formatTime(available.time) }}
                                        </p>
                                    </Button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <div class="flex justify-center">
                    <button @click="closeModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-3 mb-3">
                        Cancel
                    </button>
                    <button type="submit" as="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-3 mb-3">
                        Book
                    </button>
                </div>
            </template>
        </Modal>
    </form>
</template>


<script setup>
import { useForm } from "@inertiajs/vue3"
import axios from "axios"
import { Button, Modal } from 'flowbite-vue'
import moment from 'moment'
import 'moment-timezone'
import { onMounted, ref, watch } from 'vue'

const emit = defineEmits()

const closeModal = () => {
    emit('close')
}

const props = defineProps({
    dentists: {
        type: Array,
    },
    user: {
        type: Object,
    },
    appointments: {
        type: Array
    },
})

let selectedTime = ref(null)

const idNumber = ref('');
const last_name = ref('');
const first_name = ref('');
const middle_name = ref('');
const fullName = ref('');
const pangalan = ref('');

let services = ref({})

onMounted(async () => {
    if (props.user.user_type === "student") {
        idNumber.value = props.user.student.id_number;
        last_name.value = props.user.student.last_name + ", ";
        first_name.value = props.user.student.first_name;
        middle_name.value = props.user.student.middle_name;
        if(!middle_name.value === null){
            fullName.value = last_name.value + first_name.value + ", " + middle_name.value;
        }else{
            fullName.value = last_name.value + first_name.value;
        }
        
        pangalan.value = last_name.value + first_name.value;
        form.name = pangalan.value;
        if ((props.user.student.course == 'Doctor of Medicine' || props.user.student.course == 'BSN') && props.user.student.year != '1st Year') {
            const servicesResponse = await axios.get(route('patient.getannualservices'));
            services = servicesResponse.data;
        } else {
            const servicesResponse = await axios.get(route('patient.getregularservices'));
            services = servicesResponse.data;
        }
    } else {
        idNumber.value = props.user.employee.id_number;
        last_name.value = props.user.employee.last_name + ", ";
        first_name.value = props.user.employee.first_name;
        middle_name.value = props.user.employee.middle_name;
        fullName.value = last_name.value + first_name.value + ", " + middle_name.value;
        pangalan.value = last_name.value + first_name.value;
        form.name = pangalan.value;
        const servicesResponse = await axios.get(route('patient.getemployeeservice'));
        services = servicesResponse.data;
    }
})

const disabledDates = ref([
    {
        repeat: {
            weekdays: [1],
        },
    },
]);

const masks = ref({
    modelValue: 'YYYY-MM-DD',
});

const availableTime = ref({})

const fetchAvailableTime = async (id, date) => {
    try {
        const response = await axios.get(route('patient.appointments.getAvailableTime', { id, date }))
        availableTime.value = response.data
    } catch (error) {
        console.error(error)
    }
}

const form = useForm({
    name: null,
    dentist_id: null,
    app_date: null,
    app_time: null,
    app_type: null,
    pat_notes: null,
    time_id: null,
})

watch(() => ({ dentist_id: form.dentist_id, app_date: form.app_date }), ({ dentist_id, app_date }) => {
    if (dentist_id && app_date) {
        fetchAvailableTime(dentist_id, app_date)
    }
})

const setTime = (time, id) => {
    form.app_time = format24(time)
    form.time_id = id
}


function format24(time) {
    return moment(time, "hh:mm A").format("HH:mm:ss");
}


function formatTime(time) {
    return moment(time, "HH:mm").format("hh:mm A");
}

const create = () => form.post(route('patient.appointments.store'), { preserveScroll: false, preserveState: false })

</script>